<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['course_id','title','pos','register_id'];
    public $timestamps = false;

    // which section has which lessons
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson', 'section_id', 'id');
    }


    public function course()
    {
    	return $this->belongsTo('App\Models\Admin\Course', 'course_id', 'id');
    }

    public function owner(){
		return $this->belongsTo('App\Models\Admin\Admin','register_id')->withDefault();
	}
}
