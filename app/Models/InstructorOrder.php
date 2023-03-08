<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstructorOrder extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','order_id','course_id','price','order_number','status','charge','register_id','preloaded'];

    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order')->withDefault();
    }

    public function course()
    {
        return $this->belongsTo('App\Models\Course')->withDefault();
    }


   


    public static function instructorPrice($user_id)
    {
        $totalPrice = 0;
        foreach(InstructorOrder::where('user_id',$user_id)->get() as $data){
            
            $totalPrice = $totalPrice + $data->charge;
        }
        return $totalPrice;

    }

    public function earn($user_id, $order_id)
    {
        $order = InstructorOrder::where('user_id',$user_id)->where('order_id', $order_id)->first();
        return $order->charge;
    }

    public function totalPrice($user_id)
    {
        # code...
    }


    public static function discountPrice($discount,$price)
    {
            $totalPrice = 0;
            $discnt = $discount;
            $val = $price;
            $val = $val / 100;
            $sub = $val * $discnt;
            $dicount = $sub;
            $price = $price - $dicount;
            $totalPrice = $price;

        return $totalPrice;

    }

    public function owner(){
		return $this->belongsTo('App\Models\Admin','register_id')->withDefault();
	}
}
