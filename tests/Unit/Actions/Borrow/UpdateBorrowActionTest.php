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
        $this->partialMock(Borrow::class, function(MockInterface $mock){
            $mock->shouldReceive('save')
                ->once();
        });

        $user = new User();
        $user->id = 44;
        $user->name = 'João Testi';

        $book = new Book();
        $book->id = 100;
        $book->title = 'Harry Potter';
        $book->author = 'J.K. Howling';
        $book->user_id = 44;

        $borrow = new Borrow();
        $borrow->id = 1;
        $borrow->user_id = $user->id;
        $borrow->book_id = $book->id;

        $borrowAns = $this->action->execute($borrow);

        // Testing the book
        $this->assertEquals(100, $book->id);
        $this->assertEquals('Harry Potter', $book->title);
        $this->assertEquals('J.K. Howling', $book->author);

        // Testing the user
        $this->assertEquals('João Teste', $user->name);
        $this->assertEquals(44, $user->id);

        // Testing the borrow
        $this->isInstanceOf(Borrow::class, $borrow);
        $this->assertEquals(100, $borrow->book_id);
        $this->assertEquals(44, $borrow->user_id);
    }
}
