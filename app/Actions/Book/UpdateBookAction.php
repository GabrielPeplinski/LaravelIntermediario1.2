<?php

namespace App\Actions\Book;

use App\Models\User;
use App\Models\Book;

class UpdateBookAction
{
    public function execute(array $data, User $donor, Book $book):Book
    {
        $data['user_id'] = $donor->id;
        $book->fill($data);
        $book->save();

        return $book;
    }
}
