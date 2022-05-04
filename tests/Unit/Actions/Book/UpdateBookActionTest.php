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

        $book = $this->partialMock(Book::class, function(MockInterface $mock){
            $mock->shouldReceive('save')
                ->once();
        });

        $data = [
            'title'=>'20 Mil léguas Submarinas',
            'author'=>'Júlio Verne',
            'available' => true,
            'user_id' => 2
        ];

        $user = new User();
        $user->id = 1;

        $book->fill($data);

        $dataUpdate = [
            'title' => 'Harry Potter',
            'author' => 'J.K. Howling',
            'available' => true,
        ];

        $bookUpdated = $this->action->execute($dataUpdate, $user, $book);

        $this->assertInstanceOf(Book::class, $bookUpdated);
        $this->assertEquals($dataUpdate['title'], $bookUpdated->title);
        $this->assertEquals('J.K. Howling', $bookUpdated->author);
        $this->assertEquals(1, $bookUpdated->user_id);
    }
}
