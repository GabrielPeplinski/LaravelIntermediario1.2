<?php

namespace Tests\Unit\Actions\Borrow;

use App\Actions\Borrow\DeleteBorrowAction;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Mockery\MockInterface;
use Tests\TestCase;

class DeleteBorrowActionTest extends TestCase
{
    protected function setUp():void
    {
        parent::setUp();
        $this->action = new DeleteBorrowAction();
    }

    public function test_should_delete_borrow()
    {
        $bookMock = $this->createMock(Book::class);
        $userMock = $this->createMock(User::class);
        $borrowMock = $this->createMock(Borrow::class);

        /*
        $bookMock->id = 100;
        $bookMock->title = '20 Mil Léguas Submarinas';
        $bookMock->author = 'Julio Verne';
        $bookMock->user_id = 44;
        $bookMock->available = false;

        $userMock->id = 44;
        $userMock->name = 'João Testi';

        dd($bookMock, $userMock);

        $borrowMock->id = 3;
        $borrowMock->book_id = $bookMock->id;
        $borrowMock->user_id = $userMock->id;
        */

        $borrowMock->expects($this->once())->method('delete')->willReturn(true);

        $this->action->execute($borrowMock);
    }
}
