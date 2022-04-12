<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    public function Book()
    {
        $this->hasOne(Book::class);
    }

    public function User()
    {
        $this->hasOne(User::class);
    }
}
