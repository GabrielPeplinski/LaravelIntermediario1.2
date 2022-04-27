<?php

namespace App\Actions\Book;

use App\Models\User;
use App\Models\Book;

class CreateBookAction
{
    public function execute(array $data, User $donor):Book
    {
        $book = new Book;

        $book->title = $data['title'];
        $book->author = $data['author'];
        $book->donor = $data['donor'];
        $book->available = true;

        $book->user_id = $donor->id;

        $book->save();
        return $book;
    }
}