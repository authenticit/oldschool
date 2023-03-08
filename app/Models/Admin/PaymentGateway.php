<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'details', 'subtitle', 'name', 'type', 'information','keyword','status','register_id','preloaded'];
    public $timestamps = false;

    public function convertAutoData(){
        return  json_decode($this->information,true);
    }

    public function getAutoDataText(){
        $text = $this->convertAutoData();
        return '<img src="'.asset('assets/images/'.end($text)).'">';
    }

    public function showKeyword(){
        $data = $this->keyword == null ? 'other' : $this->keyword;
        return $data;
    }

    public function upload($name,$file,$oldname)
    {
        $file->move('assets/images',$name);
        if($oldname != null)
        {
            if(file_exists(base_path('../assets/images/'.$oldname))){
                unlink(base_path('../assets/images/'.$oldname));
            }
        }
    }

    public function ownerupload($name,$file,$oldname,$owner)
    {
        $file->move('assets/'.$owner.'/owner/images',$name);
        if($oldname != null)
        {
            if(file_exists(base_path('../assets/'.$owner.'/owner/images/'.$oldname))){
                unlink(base_path('../assets/'.$owner.'/owner/images/'.$oldname));
            }
        }
    }

    public function owner(){
		return $this->belongsTo('App\Models\Admin','register_id')->withDefault();
	}
}
