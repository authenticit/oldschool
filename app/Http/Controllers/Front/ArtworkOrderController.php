<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\ArtWork;
use App\Models\ArtWorkOrder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class ArtworkOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function artWorkOrder(Request $request, $artwork_id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $artwork = ArtWork::where('id', $artwork_id)->first();


        $order = new ArtWorkOrder;
        $order->user_id = $user->id;
        $order->order_number = Str::random(4).time();
        $order->artwork_id = $artwork->id;
        $order->artist_id = $artwork->artist_id;
        $order->pay_amount = $artwork->price;
        $order->status = 'Completed';
        $order->payment_status = 'Completed';
        $order->save();

        return redirect()->route('frontend.artwork.checkout', $order->order_number);
        
    }
}
