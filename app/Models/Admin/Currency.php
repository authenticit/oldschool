<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sign', 'is_default', 'value','register_id','preloaded'];
    public $timestamps = false;
    
    public function owner(){
		return $this->belongsTo('App\Models\Admin','register_id')->withDefault();
	}
}
