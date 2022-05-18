<?php

namespace Tests\Unit\Actions\Borrow;

use App\Actions\Borrow\CreateBorrowAction;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Mockery\MockInterface;
use Tests\TestCase;

class CreateBorrowActionTest extends TestCase
{
    protected function setUp():void
    {
        parent::setUp();
        $this->action = new CreateBorrowAction();
    }

    public function test_should_create_borrow()
    {
        $this->partialMock(Borrow::class, function(MockInterface $mock){
            $mock->shouldReceive('save')
                ->once();
        });

        $book = new Book();
        $book->id = 100;
        $book->title = '10 Mil Léguas Submarinas';
        $book->author = 'Julio Verne';
        $book->user_id = 44;

        $user = new User();
        $user->id = 44;
        $user->name = 'João Testi';

        $borrow = $this->action->execute($user, $book);

        // Testing the book
        $this->assertEquals(100, $book->id);
        $this->assertEquals('10 Mil Léguas Submarinas', $book->title);

        // Testing the user
        $this->assertEquals('João Testi', $user->name);
        $this->assertEquals(44, $user->id);

        // Testing the borrow
        $this->isInstanceOf(Borrow::class, $borrow);
        $this->assertEquals(100, $borrow->book_id);
        $this->assertEquals(44, $borrow->user_id);
    }
}
