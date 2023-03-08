<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Order;
use App\Models\Student\BookOrder;
use App\Models\ArtWorkOrder;


class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout($order_number)
    {
        $data['categories'] = Category::latest()->get();
        $data['order'] = Order::where('order_number', $order_number)->first();

        return view('frontend.checkout', $data);

    }

    public function book_checkout($order_number)
    {
        $data['categories'] = Category::latest()->get();
        $data['order'] = BookOrder::where('order_number', $order_number)->first();

        return view('frontend.book.checkout', $data);

    }

    public function artwork_checkout($order_number)
    {
        $data['title'] = 'Checkout';
        $data['categories'] = Category::latest()->get();
        $data['order'] = ArtWorkOrder::where('order_number', $order_number)->first();

        return view('frontend.artist.checkout', $data);
    }


}
