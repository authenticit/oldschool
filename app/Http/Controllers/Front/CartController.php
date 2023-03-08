<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Course;
use App\Models\Cart;
use App\Models\Settings\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function cart()
    {
        if (!Session::has('cart')) {
            return view('front.cart');
        }

        $gs = GeneralSetting::findOrFail(1);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $data['courses'] = $cart->items;
        $data['totalPrice'] = $cart->totalPrice;

        return view('front.cart', $data);
    }

    public function cartView()
    {
        return view('load.cart');
    }

    public function addToCart(Request $request, $id)
    {
        $course = Course::where('id','=',$id)->first(['id', 'register_id', 'user_id', 'title', 'slug', 'photo', 'price', 'discount_price']);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $affiliateUser = 0;
        $type = '';
        if(Auth::check()){
            if($request->has('ref')){
                if(!empty($request->ref)){
                    $affiliateUser = (int)$request->ref == 0 ? 0 : (int)$request->ref;
                    $type = $request->type;
                }
            }
        }

        if(isset($cart->items[$course->id]))
        {
            return redirect()->route('front.cart')->with('error', 'Already Added To Cart');
        }

        $instructor = !empty($course->instructor) ? $course->instructor->showName() : \DB::table('admins')->first()->name;
        $cart->add($course, $course->id, $instructor, $affiliateUser, $type);

        Session::put('cart', $cart);
        return redirect()->route('front.cart');
    }

    public function addCart(Request $request, $id)
    {
        $course = Course::where('id','=',$id)->first(['id', 'register_id', 'user_id', 'title', 'slug', 'photo', 'price', 'discount_price']);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $affiliateUser = 0;
        $type = '';
        if(Auth::check()){
            if($request->has('ref')){
                if(!empty($request->ref)){
                    $affiliateUser = (int)$request->ref == 0 ? 0 : (int)$request->ref;
                    $type = $request->type;
                }
            }
        }

        if(isset($cart->items[$course->id]))
        {
            return response()->json('already');
        }

        $instructor = !empty($course->instructor) ? $course->instructor->showName() : \DB::table('admins')->first()->name;
        $cart->add($course, $course->id, $instructor, $affiliateUser, $type);
        Session::put('cart',$cart);
        $data[0] = count($cart->items);

        return response()->json($data);
    }

    public function removeCart($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
            $data[0] = $cart->totalPrice;
            $data[1] = count($cart->items);
            return response()->json($data);
        } else {
            Session::forget('cart');
            $data = 0;
            return response()->json($data);
        }
    }
}
