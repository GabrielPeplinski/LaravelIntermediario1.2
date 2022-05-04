<?php

namespace App\Actions\Borrow;

use App\Models\Borrow;
use App\Models\Book;

class DeleteBorrowAction
{
    public function execute(Borrow $borrow):bool
    {
        $books = Book::all();

        foreach($books as $book){
            if($book->id === $borrow->book_id)
                $book->available = true;
            $book->save();
        }

        return $borrow->delete();
    }
}
