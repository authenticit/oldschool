<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    use HasFactory;

    public function category()
    {
    	return $this->belongsTo('App\Models\Admin\ArtCategory', 'category_id');
    }
}
