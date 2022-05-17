<?php

namespace App\Actions\Book;

use App\Models\User;
use App\Models\Book;

class CreateBookAction
{
    public function execute(array $data, User $donor): Book
    {
        $book = app(Book::class);

        $book->fill($data);
        $book->available = true;

        $book->user_id = $donor->id;

        if (data_get($data, 'image')) {
            (new AddBookMediaAction())->execute($data, $book);
        }

        $book->save();

        return $book;
    }
}
