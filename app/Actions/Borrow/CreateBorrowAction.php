<?php

namespace App\Actions\Borrow;

use App\Models\User;
use App\Models\Borrow;
use App\Models\Book;

class CreateBorrowAction
{
    public function execute(User $userBorrow, Book $book):Borrow
    {
        $borrow = app(Borrow::class);

        $borrow->book_id = $book->id;
        $borrow->user_id = $userBorrow->id;
        $borrow->return_date = date('Y-m-d ', strtotime('+1 week'));
        $book->available = false;

        $book->save();
        $borrow->save();

        return $borrow;
    }
}
