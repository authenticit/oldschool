<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSetting extends Model
{
    use HasFactory;

    protected $fillable = ['contact_success','faq_image','faq_link','contact_email','contact_title','contact_text','street','phone','fax','email','site','side_title','side_text','slider','service','featured','small_banner','best','top_rated','large_banner','big','hot_sale','review_blog','best_seller_banner','best_seller_banner_link','big_save_banner','big_save_banner_link','best_seller_banner1','best_seller_banner_link1','big_save_banner1','big_save_banner_link1','partners','bottom_small','flash_deal','featured_category','hero_bg','instructor_img','register_id','preloaded','newsletter_image','newsletter_title','newsletter_text','hero_title','hero_text','hero_btn_text','hero_btn_url'];

    public $timestamps = false;

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

    public function owner(){
		return $this->belongsTo('App\Models\Admin','register_id')->withDefault();
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
}
