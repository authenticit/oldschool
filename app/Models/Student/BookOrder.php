<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Admin\Book;

class BookOrder extends Model
{
    use HasFactory;
    public function book()
    {
    	return $this->belongsTo(Book::class, 'book_id');
    }

   

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id', 'role', 'instructor');
    }
}
