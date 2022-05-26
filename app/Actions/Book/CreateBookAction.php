<?php

namespace App\Actions\Book;

use App\Dto\BookData;
use App\Models\User;
use App\Models\Book;

class CreateBookAction
{
    public function execute(BookData $bookData, User $donor): Book
    {
        $book = app(Book::class);

        $book->title = $bookData->title;
        $book->author = $bookData->author;
        $book->available = true;
        $book->user_id = $donor->id;

        if (data_get($bookData, 'image')) {
            (new AddBookMediaAction())->execute($bookData, $book);
        }

        $book->save();

        return $book;
    }
}
