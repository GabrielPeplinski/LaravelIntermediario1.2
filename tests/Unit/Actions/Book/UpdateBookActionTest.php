<?php

namespace Tests\Unit\Actions\Book;

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
        $this->action = new UpdateBookAction();
    }

    public function test_should_update_book_when_valid_data()
    {
        /*
        $this->partialMock(Book::class, function(MockInterface $mock){
            $mock->shouldReceive('save')
                ->once();
        });
        */

        $bookMock = $this->createMock(Book::class);
        $userMock = $this->createMock(User::class);

        $data = [
            'title'=>'20 Mil léguas Submarinas',
            'author'=>'Júlio Verne',
            'available' => true,
            'user_id' => 2
        ];

        $bookMock->fill($data);
        $userMock->id = 78;

        $bookUpadted = $this->action->execute(['Harry Potter', 'J.K. Howling'], $userMock, $bookMock);

        $this->assertInstanceOf(Book::class, $bookUpadted);
        $this->assertEquals('Harry Potter', $bookMock->title);
        $this->assertEquals('J.K. Howling', $bookMock->author);
        $this->assertEquals(1, $bookMock->user_id);

        $bookUpadted = $this->$bookMock->expects($this->once())
            ->method('save');
    }
}
