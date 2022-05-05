<?php

namespace App\Actions\Book;

use App\Models\Book;

class MakeBookAvailableAction
{
    public function execute(Book $book):Book
    {
        $book->available = true;
        $book->save();

        return $book;
    }
}
