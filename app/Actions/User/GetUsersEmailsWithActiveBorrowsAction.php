<?php

namespace App\Actions\User;

use App\Models\User;

class GetUsersEmailsWithActiveBorrowsAction
{
    public function execute(): array
    {
        $emailList = User::whereHas('borrowed')
            ->toBase()
            ->get(['id', 'email']);

        return $emailList
            ->pluck('email')
            ->toArray();
    }
}
