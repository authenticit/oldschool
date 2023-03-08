<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\BookOrder;
use App\Models\Front\ShurjoPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class BookPayController extends Controller
{
    public $curr;

	public function __construct()
	{
		$this->middleware('auth');
		$this->curr = DB::table('currencies')->where('register_id', 0)->where('is_default', '=', 1)->first();
	}

    public function create(Request $request)
	{
		$pay_amount = $request->amount;
		$order_number = $request->order_number;
		$url = route('payment.result', $order_number);

		$client = new ShurjoPay($pay_amount, $url);

		if ($client) {
			$txnId = $client->generateTxnId();
			return $client->makePayment();
		} else {
			return back();
		}
	}


	public function bookinitialPayment(Request $request)
	{
		$user = Auth::user();
		$info = array(
			'currency' => "BDT",
			'amount' => $request->amount,
			'order_id' => $request->order_number,
			'client_ip' => "102.101.1.2",
			'customer_name' => $user->name,
			'customer_phone' => $user->phone,
			'email' => $user->email,
			'customer_address' => "dhaka",
			'customer_city' => "dhaka",
			'customer_state' => "BD",
			'customer_postcode' => 9100,
			'customer_country' => "Bangladesh",
		);

		$shurjopay_service = new ShurjopayController();
		$orderSP = explode(";", $shurjopay_service->checkout($info)->content());
		$order = BookOrder::where('order_number', $request->order_number)->first();
		$order->order_number = substr($orderSP[1], 0, 1);
		$order->save();

		return $shurjopay_service->checkout($info);
	}

	public function bookverifyPayment(Request $request)
	{
		$order_id = $request->order_id;
		$shurjopay_service = new ShurjopayController();
		$data = $shurjopay_service->verify($order_id);
		$data1 = explode(',', $data);
		$spCode = explode(':', $data1[16]);
		$order = BookOrder::where('order_number', $order_id)->first();
		if ($spCode[1] != 1000) {
			return redirect()->route('frontend.checkout', $order->order_number)->with('error', 'আপনার পেমেন্টটি সম্পন্ন করা যায়নি, দয়া করে পুনরায় পেমেন্ট করুন');
		} else {
			$order->tx_id = $request->tx_id;
			$order->bank_tx_id = $request->bank_tx_id;;
			$order->method = $request->sp_payment_option;
			$order->status = 'Completed';
			$order->payment_status = 'Completed';
			$order->save();

			return view('welcome');
		}
	}
}
