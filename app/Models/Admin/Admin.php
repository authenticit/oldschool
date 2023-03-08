<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $guard = 'admin';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'role_id', 'role', 'parent_id', 'photo', 'created_at', 'updated_at', 'remember_token','biography','address','slug', 'username','package_id','wp_response','email_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function child(){
        return $this->hasMany('App\Models\Admin','parent_id');
    }

    public function languages(){
        return $this->hasMany('App\Models\Language','register_id');
    }

    public function adminLanguages(){
        return $this->hasMany('App\Models\AdminLanguage','register_id');
    }

    public function students(){
        return $this->hasMany('App\Models\User','register_id')->where('is_instructor','!=',2);
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'admin_id', 'id');
    }


    public function instructors(){
        return $this->hasMany('App\Models\User','register_id')->where('is_instructor','=',2);
    }


    public function parent(){
        return $this->belongsTo('App\Models\Admin','parent_id')->withDefault();
    }

    public function staff_role(){
        return $this->belongsTo('App\Models\Role','role_id')->withDefault();
    }

    public function package(){
		return $this->belongsTo('App\Models\SubscriptionPackage','package_id')->withDefault();
	}

    public function IsSuper(){
        if ($this->role == 'Administrator') {
           return true;
        }
        return false;
    }

    public function IsAdmin(){
        if ($this->role == 'Administrator') {
           return true;
        }
        return false;
    }

    public function IsOwner(){
        if ($this->role == 'Owner') {
           return true;
        }
        return false;
    }

    public function IsAdminStaff(){
        if ($this->role == null && $this->parent_id == 1) {
           return true;
        }
        return false;
    }

    public function IsOwnerStaff($parent_id){
        if ($this->role == null && $this->parent_id == $parent_id) {
           return true;
        }
        return false;
    }

    public function sectionCheck($value){
        $sections = explode(" , ", $this->staff_role->section);
        if (in_array($value, $sections)){
            return true;
        }else{
            return false;
        }
    }
}
