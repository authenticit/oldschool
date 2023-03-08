<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Book;
use App\Models\Admin\BookOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function bookOrder(Request $request, $book_id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $book = Book::where('id', $book_id)->first();


        $order = new BookOrder;
        $order->user_id = $user->id;
        $order->order_number = Str::random(4).time();
        $order->book_id = $book->id;
        $order->pay_amount = $book->actual_price;
        $order->status = 'Completed';
        $order->payment_status = 'Completed';
        $order->save();


        return redirect()->route('frontend.book.checkout', $order->order_number);
        
    }
    
}
