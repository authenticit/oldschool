<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['lesson_id','title','options','answers','pos','register_id'];
    public $timestamps = false;

    public function lessons()
    {
    	return $this->belongsTo('App\Models\Lesson');
    }

    public function owner(){
		return $this->belongsTo('App\Models\Admin\Admin','register_id')->withDefault();
	}
}
