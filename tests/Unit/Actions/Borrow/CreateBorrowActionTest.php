<?php

namespace Tests\Unit\Actions\Borrow;

use App\Jobs\SendBorrowEmail;
use Illuminate\Support\Facades\Bus;
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
        Bus::fake();

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

        Bus::assertDispatched(SendBorrowEmail::class);

        $this->isInstanceOf(Borrow::class, $borrow);
        $this->assertEquals(100, $borrow->book_id);
        $this->assertEquals(44, $borrow->user_id);
    }
}
