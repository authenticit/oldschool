<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo('App\Models\Admin\Course','course_id', 'id');
    }
}
