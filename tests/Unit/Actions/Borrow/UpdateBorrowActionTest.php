<?php

namespace Tests\Unit\Actions\Borrow;

use App\Actions\Borrow\UpdateBorrowAction;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Mockery\MockInterface;
use Tests\TestCase;

class UpdateBorrowActionTest extends TestCase
{
    protected function setUp():void
    {
        parent::setUp();
        $this->action = new UpdateBorrowAction();
    }

    public function test_should_update_borrow_when_called()
    {
        $borrow = $this->partialMock(Borrow::class, function(MockInterface $mock){
            $mock->shouldReceive('save')
                ->once();
        });

        $data = [
            'id' => 66,
            'title'=>'Odisséia',
            'author'=>'Homero',
            'available' => true,
            'user_id' => 5
        ];

        $book = new Book();
        $book->fill($data);

        $userData = [
            'name' => 'Caio'
        ];

        $user = new User();
        $user->fill($userData);
        $user->id = 41;

        $borrowData = [
            'id' => 5,
            'book_id' => $book->id,
            'user_id' => $user->id,
            'return_date' => '2022-05-04'
        ];

        $borrow->fill($borrowData);

        $borrowAns = $this->action->execute($borrow);

        // Testing the book
        $this->assertEquals(66, $book->id);
        $this->assertEquals('Odisséia', $book->title);
        $this->assertEquals('Homero', $book->author);

        // Testing the user
        $this->assertEquals('Caio', $user->name);
        $this->assertEquals(41, $user->id);

        // Testing the borrow
        $this->isInstanceOf(Borrow::class, $borrowAns);
        $this->assertEquals(66, $borrowAns->book_id);
        $this->assertEquals(41, $borrowAns->user_id);
        $this->assertEquals('2022-05-11', $borrowAns->return_date);
    }
}
