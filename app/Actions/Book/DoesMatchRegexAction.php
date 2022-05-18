<?php

namespace App\Actions\Book;

class DoesMatchRegexAction
{
    public function execute($regex, $value):bool
    {
        if(!preg_match($regex, $value)){
            return false;
        }

        return true;
    }
}
