<?php

namespace App\Actions\Book;

class IsValidAction
{
    public function execute(array $value): bool
    {
        $isString = (new IsStringAction());
        $matchRegex = (new DoesMatchRegexAction());

        if (!$isString->execute($value['title']) || !$isString->execute($value['author'])) {
            return false;
        }

        if (!$matchRegex->execute('/[^a-z_\-0-9]/', $value['title'])
            || !$matchRegex->execute('/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/', $value['author'])) {
            return false;
        }

        return true;
    }
}
