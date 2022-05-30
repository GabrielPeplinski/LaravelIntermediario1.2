<?php

namespace App\Actions\Borrow;

use App\Jobs\SendBorrowEmail;
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

        $borrow->save();
        $book->update([
            'available' => false
        ]);

        dispatch(new SendBorrowEmail($book, $borrow, $userBorrow));

        return $borrow;
    }
}
