<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    public function category()
    {
    	return $this->belongsTo('App\Models\Admin\ArtCategory', 'category_id');
    }

    public function medium()
    {
    	return $this->belongsTo('App\Models\Admin\Medium', 'medium_id');
    }

    public function artist()
    {
    	return $this->belongsTo('App\Models\Admin\Artist', 'artist_id');
    }
}
