<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = ['section_id','type','title','details','pos','video_file','file','url','duration','iframe_code','register_id'];
    public $timestamps = false;

    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function section()
    {
    	return $this->belongsTo('App\Models\Section', 'section_id', 'id');
    }

    public function owner(){
		return $this->belongsTo('App\Models\Admin\Admin','register_id')->withDefault();
	}

    // which course this lesson belongs to
    public function course()
    {
        return $this->belongsTo('App\Models\Admin\Course', 'course_id', 'id');
    }
}
