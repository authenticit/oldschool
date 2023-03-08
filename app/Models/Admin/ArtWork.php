<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtWork extends Model
{
    use HasFactory;

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_id');
    }
    
}
