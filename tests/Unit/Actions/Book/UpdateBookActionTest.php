<?php

namespace Tests\Unit\Actions\Book;

use App\Actions\Book\CreateBookAction;
use App\Actions\Book\UpdateBookAction;
use App\Models\Book;
use App\Models\User;
use Mockery\MockInterface;
use Tests\TestCase;

class UpdateBookActionTest extends TestCase
{
    protected function setUp():void
    {
        parent::setUp();
        $this->createAction = new CreateBookAction();
        $this->updateAction = new UpdateBookAction();
    }

    public function test_should_update_book_when_valid_data()
    {

        $this->partialMock(Book::class, function(MockInterface $mock){
            $mock->shouldReceive('save')
                ->once();
        });


//        $bookMock = $this->createMock(Book::class);
//        $userMock = $this->createMock(User::class);

        $data = [
            'title'=>'20 Mil léguas Submarinas',
            'author'=>'Júlio Verne',
            'available' => true,
            'user_id' => 2
        ];

        $user = new User();
        $user->id = 1;

        $book = $this->createAction->execute($data, $user);

        $data = [
            'title' => 'Harry Potter',
            'author' => 'J.K. Howling'
        ];
        $bookUpdated = $this->updateAction->execute($data, $user, $book);

        $this->assertInstanceOf(Book::class, $bookUpdated);
        $this->assertEquals($data['title'], $bookUpdated->title);
        $this->assertEquals('J.K. Howling', $bookUpdated->author);
        $this->assertEquals(1, $bookUpdated->user_id);

        $bookUpdated = $this->$book->expects($this->once())
            ->method('save');
    }
}
