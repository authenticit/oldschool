<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Book extends Model
{
    use HasFactory;
    public function bookCategory()
    {
        return $this->belongsTo('App\Models\Admin\BookCategory');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'role', 'user');
    }
}
