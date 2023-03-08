<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrolledCourse extends Model
{
    use HasFactory;
    protected $fillable = ['course_id','user_id', 'order_id', 'certificate', 'status'];

    public $timestamps = false;

    public function user()
    {
    	return $this->belongsTo('App\Models\User')->withDefault();
    }

    public function course()
    {
    	return $this->belongsTo('App\Models\Admin\Course')->withDefault();
	}
	
	public function owner(){
        return $this->belongsTo('App\Models\Admin\Admin','register_id')->withDefault();
    }

    public function order(){
		return $this->belongsTo('App\Models\Admin\Order', 'order_id');
	}
}
