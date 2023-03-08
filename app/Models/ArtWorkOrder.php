<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\ArtWork;
use App\Models\User;

class ArtWorkOrder extends Model
{
    use HasFactory;

    public function artworks()
    {
        return $this->belongsTo(ArtWork::class, 'artwork_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'role', 'user');
    }

    public function artist()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'role', 'artist');
    }
}
