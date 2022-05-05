<?php

namespace App\Actions\Borrow;

use App\Actions\Book\MakeBookAvailableAction;
use App\Models\Borrow;

class DeleteBorrowAction
{
    public function execute(Borrow $borrow):bool
    {
//        $otherBook = new Book();
//        $borrow->setRelation('book', $otherBook);

        app(MakeBookAvailableAction::class)->execute($borrow->book);

        return $borrow->delete();
    }
}
