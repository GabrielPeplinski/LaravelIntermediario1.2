<?php

namespace App\Actions\Book;

use App\Models\Book;

class AddBookMediaAction
{
    public function execute(array $data, Book $book): ?\Spatie\MediaLibrary\MediaCollections\Models\Media
    {
        if (!$image = data_get($data, 'image')) {
            return null;
        }

        return $book->addMedia($image)
            ->toMediaCollection('cover');
    }
}
