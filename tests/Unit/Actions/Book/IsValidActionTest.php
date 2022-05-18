<?php

namespace Tests\Unit\Actions\Book;

use App\Actions\Book\IsValidAction;
use Tests\TestCase;

class IsValidActionTest extends TestCase
{
    public function test_should_return_true_when_date_is_valid()
    {
        $data = [
            'title'=>'As Aventuras de Pi',
            'author'=>'Yann Martel',
        ];

        $ans = (new IsValidAction())->execute($data);
        $this->assertTrue($ans);
    }

    public function test_should_return_true_when_date_is_valid_2()
    {
        $data = [
            'title'=>'O Hobbit',
            'author'=>'Tolkien',
        ];

        $ans = (new IsValidAction())->execute($data);
        $this->assertTrue($ans);
    }

    public function test_should_return_false_when_date_is_invalid()
    {
        $data = [
            'title'=>'O Hobbit',
            'author'=>3333,
        ];

        $ans = (new IsValidAction())->execute($data);
        $this->assertFalse($ans);
    }

    public function test_should_return_false_when_date_is_invalid_2()
    {
        $data = [
            'title'=>true,
            'author'=>'Author',
        ];

        $ans = (new IsValidAction())->execute($data);
        $this->assertFalse($ans);
    }
}
