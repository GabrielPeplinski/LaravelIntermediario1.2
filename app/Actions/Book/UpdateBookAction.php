<?php

namespace App\Actions\Book;

use App\Models\User;
use App\Models\Book;

class UpdateBookAction
{
    public function execute(array $data, User $donor, Book $book):Book
    {
        //$book = app(Book::class);
        $book->fill($data);
        $book->user_id = $donor->id;
        $book->save();

        return $book;
    }
}
