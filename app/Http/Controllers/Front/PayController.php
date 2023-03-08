<?php
namespace App\Http\Controllers\Front;
use App\Models\Cart;
use App\Models\Admin\Order;
use App\Models\InstructorOrder;
use App\Models\User;
use App\Classes\GeniusMailer;
use App\Models\Notification;
use App\Models\UserNotification;
use App\Models\Admin\Course;
use App\Models\Currency;
use App\Models\Referral;
use App\Models\PaymentGateway;
use App\Models\Student\EnrolledCourse;
use App\Models\ReferralHistory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Order as AdminOrder;
use App\Models\Admin\PaymentGateway as AdminPaymentGateway;
use App\Models\Front\ShurjoPay;
use App\Models\Settings\GeneralSetting;
// use App\Models\Student\EnrolledCourse as StudentEnrolledCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Validator;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;
use shurjopayv2\ShurjopayLaravelPackage8\ShurjopayServiceProvider;


class PayController extends Controller
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

    public function initialPayment(Request $request)
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
        $orderSPA = explode("/>", $orderSP[2]);
        $orderSPB = explode("=", $orderSPA[0]);
        $order = Order::where('order_number', $request->order_number)->first();
        $order->order_number = substr($orderSPB[1], 0, -3);
        $order->tx_id = $request->tx_id;
        $order->bank_tx_id = $request->bank_tx_id;;
        $order->method = $request->sp_payment_option;
        $order->pay_amount = $request->amount;
        $order->save();

        if ($order->sp_order_id) {
            EnrolledCourse::create([
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'course_id' => $order->course_id,
                'status' => 0,
            ]);
        }


        return $shurjopay_service->checkout($info);
    }

    public function verifyPayment(Request $request)
    {
        $order_id = $request->order_id;
        $shurjopay_service = new ShurjopayController();
        $data = $shurjopay_service->verify($order_id);
        $data1 = explode(',', $data);
        $spCode = explode(':', $data1[16]);
        $order = Order::where('order_number', $order_id)->first();
        if ($spCode[1] != 1000) {
            return redirect()->route('frontend.checkout', $order->order_number)->with('error', 'আপনার পেমেন্টটি সম্পন্ন করা যায়নি, দয়া করে পুনরায় পেমেন্ট করুন');
        } else {



            /* if($course->percentage != null){
                $commission = ($course->percentage * $course->price)/100;
            }else{
                $commission = 0;
            }

            InstructorOrder::create([
                'user_id' => $course->user_id,
                'order_id' => $order->id,
                'course_id' => $order->course_id,
                'price' => $course->price,
                'order_number' => $order->order_number,
                'status' => 'Completed',
                'charge' => $commission
            ]);

            $instructor = User::where('id', $course->user_id)->first();
            $instructor->balance = $instructor->balance + $commission;
            $instructor->save();

            $notification = new Notification();
            $notification->order_id = $order->id;
            $notification->save(); */

            return view('welcome');
        }
    }
}