<?php

namespace App\Actions\Borrow;

use App\Models\Borrow;

class UpdateBorrowAction
{
    public function execute(Borrow $borrow):Borrow
    {
        $old_date = $borrow -> return_date;
        $borrow->return_date = date('Y-m-d', strtotime('+1week',strtotime($old_date)));
        $borrow->save();

        return $borrow;
    }
}
