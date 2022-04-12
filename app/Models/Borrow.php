<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'return_date'
    ];

    public function book()
    {
        return $this->hasOne(Book::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
