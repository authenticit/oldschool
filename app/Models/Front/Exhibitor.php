<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Front\Exhibition;


class Exhibitor extends Model
{
    use HasFactory;

    protected $table = 'exhibitors';

    public function exhibition()
    {
    	return $this->belongsTo(Exhibition::class, 'exhibition_id');
    }

    public function country()
    {
    	return $this->belongsTo('App\Models\Country', 'country_id');
    }

    public function school()
    {
    	return $this->belongsTo('App\Models\School', 'school_id');
    }

    public function groupName()
    {
    	return $this->belongsTo('App\Models\Group', 'group');
    }
}
