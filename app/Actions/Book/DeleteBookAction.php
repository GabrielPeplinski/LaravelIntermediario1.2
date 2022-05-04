<?php

namespace App\Actions\Book;

use App\Models\Book;

class DeleteBookAction
{
    public function execute(Book $book):bool
    {
        return $book->delete();
    }
}
