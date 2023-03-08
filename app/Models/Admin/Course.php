<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Wishlist;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'admin_id', 'title','slug','price', 'time', 'discount_price','category_id','subcategory_id','language_id','short_description','description','level','requirements','outcomes','is_top','is_free','course_overview_type','course_overview_url','photo','meta_keywords','meta_description','status','include_icon', 'percentage', 'include_text','register_id','preloaded','future_update'];

    public function category()
    {
    	return $this->belongsTo('App\Models\Admin\Category');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section', 'course_id', 'id');
    }

  

    // relation with user id where role is instructor
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'role', 'instructor',);
    }




    public function author()
    {
        return $this->belongsTo('App\Models\Admin\Admin', 'admin_id', 'id');
    }

    public function wishlist(){
        return $this->hasMany('App\Models\Wishlist');
    }

    public function ratings()
    {
        return $this->hasMany('App\Models\Rating');
    }

    public function enrolled_courses()
    {
        return $this->hasMany('App\Models\Student\EnrolledCourse','course_id', 'id');
    }

    public function convertTime() {

        $total_seconds = 0;
        foreach($this->sections as $section){
            foreach($section->lessons as $lesson){
                if($lesson->duration != null){
                    list($hr, $min, $sec) = explode(':',$lesson->duration);
                    $total_seconds += (((int)$hr) * 60 * 60) + (((int)$min) * 60) + ((int)$sec);
                }
            }
        }

        $hours = floor($total_seconds / 3600);
        $minutes = floor(($total_seconds / 60) % 60);
        $seconds = $total_seconds % 60;

        $t_hours = $hours != 0 ? ( $hours > 1 ? $hours.' '.__('Hours') : $hours.' '.__('Hour') ) : '';
        $t_minutes = $minutes != 0 ? ( $minutes > 1 ? ' '.$minutes.' '.__('Minutes') : ' '.$minutes.' '.__('Minute') ) : '';
        $t_seconds = $seconds != 0 ? ( $seconds > 1 ? ' '.$seconds.' '.__('Seconds') : ' '.$seconds.' '.__('Second') ) : '';

        return $t_hours.$t_minutes.$t_seconds;

    }

    public function convertSectionTime($id) {

        $total_seconds = 0;
        foreach($this->sections()->whereId($id)->get() as $section){
            foreach($section->lessons as $lesson){
                if($lesson->duration != null){
                    list($hr, $min, $sec) = explode(':',$lesson->duration);
                    $total_seconds += (((int)$hr) * 60 * 60) + (((int)$min) * 60) + ((int)$sec);
                }
            }
        }

        $hours = floor($total_seconds / 3600);
        $minutes = floor(($total_seconds / 60) % 60);
        $seconds = $total_seconds % 60;

        $t_hours = $hours != 0 ? ( $hours > 1 ? $hours.' '.__('Hours') : $hours.' '.__('Hour') ) : '';
        $t_minutes = $minutes != 0 ? ( $minutes > 1 ? ' '.$minutes.' '.__('Minutes') : ' '.$minutes.' '.__('Minute') ) : '';
        $t_seconds = $seconds != 0 ? ( $seconds > 1 ? ' '.$seconds.' '.__('Seconds') : ' '.$seconds.' '.__('Second') ) : '';

        return $t_hours.$t_minutes.$t_seconds;

    }


    public function showTitle() {
        $name = mb_strlen($this->title,'UTF-8') > 50 ? mb_substr($this->title,0,50,'UTF-8').'...' : $this->title;
        return $name;
    }

    public function showLessons() {

        foreach($this->sections as $sction){
            if(count($sction->lessons) > 0){
                return true;
            }
        }
        return false;

    }

    public function owner(){
		return $this->belongsTo('App\Models\Admin','register_id')->withDefault();
	}

    // which course has which sections
    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'course_id', 'id');
    }

    // which lessons are which course under
    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson', 'course_id', 'id');
    }
}
