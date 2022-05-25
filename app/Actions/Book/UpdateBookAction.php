<?php

namespace App\Actions\Book;

use App\Dto\BookData;
use App\Models\User;
use App\Models\Book;

class UpdateBookAction
{
    public function execute(BookData $bookData, User $donor, Book $book): Book
    {
        $book->title = $bookData->title;
        $book->author = $bookData->author;
        $book->user_id = $donor->id;

        if (data_get($bookData, 'image')) {
            (new AddBookMediaAction())->execute($bookData, $book);
        }

        $book->save();

        return $book;
    }
}
