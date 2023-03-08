<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function blogCategory()
    {
        return $this->belongsTo('App\Models\Admin\BlogCategory');
    }
}
