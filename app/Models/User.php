<?php

namespace App\Models;

use App\Models\Admin\Course;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bio',
        'image',
        'email',
        'password',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'status',
        'address',
        'phone',
        'code',
        'is_verified',
        'message',
        'document',
        'is_instructor',
        'instructor_name',
        'instructor_slug',
        'balance',
        'affiliate_code',
        'referral_id',
        'register_id',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function courses()
    // {
    //     return $this->hasMany(Course::class, 'instructor_id');
    // }


    public function enrolled_courses()
    {
        return $this->hasMany('App\Models\EnrolledCourse','user_id');
    }

    public function socialProviders()
    {
        return $this->hasMany('App\Models\SocialProvider');
    }

    public function referral()
    {
    	return $this->belongsTo('App\Models\Referral','referral_id')->withDefault();
    }

    public function referral_history(){
        return $this->hasMany('App\Models\ReferralHistory','referrer_id');
    }

    public function instructororders(){
        return $this->hasMany('App\Models\InstructorOrder');
    }

    public function withdraws()
    {
        return $this->hasMany('App\Models\Withdraw');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function senders()
    {
        return $this->hasMany('App\Models\Conversation','sent_user');
    }

    public function wishlists()
    {
        return $this->hasMany('App\Models\Wishlist');
    }

    public function recievers()
    {
        return $this->hasMany('App\Models\Conversation','recieved_user');
    }


    public function owner(){
		return $this->belongsTo('App\Models\Admin','register_id')->withDefault();
	}
}