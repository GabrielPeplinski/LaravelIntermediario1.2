<?php

namespace Tests\Unit\Actions\Book;

use App\Actions\Book\DeleteBookAction;
use App\Models\Book;
use App\Models\User;
use Mockery\MockInterface;
use Tests\TestCase;

class DeleteBookActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = new DeleteBookAction();
    }

    public function test_should_delete_book()
    {
        $bookMock = $this->createMock(Book::class);
        $userMock = $this->createMock(User::class);

        $userMock->id = 12;
        $userMock->name = 'Pedro Testi';
        $userMock->email = 'testipedro@email.com';
        $userMock->password = '12345678';

        $bookMock->id = 23;
        $bookMock->user_id = $userMock->id;
        $bookMock->title = 'Harry Potter';
        $bookMock->author = 'J.K. Rowling';
        $bookMock->available = true;

        //dd($bookMock);
        $bookMock->expects($this->once())->method('delete')->willReturn(true);

        $this->action->execute($bookMock);
    }
}
