<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookOrder extends Model
{
    use HasFactory;

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'role', 'instructor');
    }
}
