<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id', 'method', 'discount', 'pay_amount', 'status', 'payment_status', 'tx_id', 'bank_tx_id', 'order_number','discount','register_id', 'order_id'];

    public function user()
    {
    	return $this->belongsTo('App\Models\User')->withDefault();
    }

    public function instructororders()
    {
        return $this->hasMany('App\Models\InstructorOrder');
    }

    // relation with user id where role is instructor
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id', 'user_id', 'id', 'role', 'instructor',);
    }

   
    public function instructorTotalPrice($user_id)
    {
        $totalPrice = 0;
        foreach($this->instructororders()->where('user_id','=',$user_id)->get() as $data){
            $discnt = $data->charge;
            $val = $data->price;
            $val = $val / 100;
            $sub = $val * $discnt;
            $discount = $sub;
            $price = $data->price - $discount;
            $totalPrice += $price;
        }
        return $totalPrice;

    }

    public function owner(){
		return $this->belongsTo('App\Models\Admin\Admin','register_id')->withDefault(function ($data) {
		foreach($data->getFillable() as $dt){
		$data[$dt] = __('Deleted');
			}
		});
	}
}
