<?php

namespace App\Actions\Borrow;

use App\Models\Borrow;

class ListEmailsWithActiveBorrowsAction
{
    public function execute(): array
    {
        $emailList = [];
        $borrows = Borrow::all();

        foreach ($borrows as $borrow) {
            $emailList[] = $borrow->user->email;
        }

        return array_unique($emailList);
    }
}
