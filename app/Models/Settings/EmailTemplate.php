<?php

namespace App\Models\Settings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailTemplate extends Model
{
    use HasFactory;
    protected $fillable = ['email_type', 'email_subject', 'email_body', 'status','register_id','preloaded'];
    public $timestamps = false;

    public function owner(){
		return $this->belongsTo('App\Models\Admin','register_id')->withDefault();
	}
}
