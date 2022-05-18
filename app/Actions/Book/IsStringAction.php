<?php

namespace App\Actions\Book;

class IsStringAction
{
    public function execute($value):bool
    {
        if(!is_string($value)) {
            return false;
        }

        return true;
    }
}
