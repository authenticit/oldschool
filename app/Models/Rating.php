<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = ['student_id','course_id','review','rating','review_date','register_id','preloaded'];
    public $timestamps = false;

    public function course()
    {
        return $this->belongsTo('App\Models\Course')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User')->withDefault();
    }

    public static function ratings($course_id){
        $stars = Rating::where('course_id',$course_id)->avg('rating');
        $ratings = number_format((float)$stars, 1, '.', '') * 20;
        return $ratings;
    }

    public static function normalRating($course_id){
        $stars = Rating::where('course_id',$course_id)->avg('rating');
        return number_format($stars,1);
    }

    public static function ratingCount($course_id){
        $stars = Rating::where('course_id',$course_id)->count();
        return number_format($stars);
    }

    public static function customRatings($course_id,$rating){
        $totalCount = Rating::where('course_id',$course_id)->count();
        if($totalCount == 0){
            return 0;
        }
        $ratingCount = Rating::where('course_id',$course_id)->where('rating',$rating)->count();
        $avg = ($ratingCount / $totalCount) * 100;
        return $avg ;
    }

    public static function customRatingsCount($course_id,$rating){
        $totalCount = Rating::where('course_id',$course_id)->count();
        if($totalCount == 0){
            return 0;
        }
        $ratingCount = Rating::where('course_id',$course_id)->where('rating',$rating)->count();
        $avg = ($ratingCount / $totalCount) * 100;
        return round($avg,2).'%';
    }


    public static function InstructorNormalRatings($instructor_id){

        $stars = Rating::whereHas('course', function($query) use ($instructor_id) {
            $query->where('user_id', '=', $instructor_id);
         })->avg('rating');
         return round($stars,2);
    }


    public static function InstructorOwnerRatings($register_id){

        $stars = Rating::whereHas('course', function($query) use ($register_id) {
            $query->where('register_id', '=', $register_id);
         })->avg('rating');
         return round($stars,2);
    }


    public static function InstructorRatings($instructor_id){

        $stars = Rating::whereHas('course', function($query) use ($instructor_id) {
            $query->where('user_id', '=', $instructor_id);
         })->avg('rating');
         $ratings = number_format((float)$stars, 1, '.', '') * 20;
         return $ratings;
    }

    public static function InstructorRatingCount($instructor_id){

        $stars = Rating::whereHas('course', function($query) use ($instructor_id) {
            $query->where('user_id', '=', $instructor_id);
        })->count();

        return $stars;
    }

    public function owner(){
		return $this->belongsTo('App\Models\Admin','register_id')->withDefault();
	}
}
