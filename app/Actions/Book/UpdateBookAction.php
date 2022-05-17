<?php

namespace App\Actions\Book;

use App\Models\User;
use App\Models\Book;

class UpdateBookAction
{
    public function execute(array $data, User $donor, Book $book): Book
    {
        $data['user_id'] = $donor->id;
        $book->fill($data);

        if (data_get($data, 'image')) {
            (new AddBookMediaAction())->execute($data, $book);
        }

        $book->save();

        return $book;
    }
}
