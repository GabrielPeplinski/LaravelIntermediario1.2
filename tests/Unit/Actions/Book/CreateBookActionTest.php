<?php

namespace Tests\Unit\Actions\Book;

use App\Actions\Book\CreateBookAction;
use App\Dto\BookData;
use App\Models\Book;
use App\Models\User;
use Mockery\MockInterface;
use Tests\TestCase;

class CreateBookActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = new CreateBookAction();
    }

    public function test_should_create_book_when_valid_data()
    {
        $this->partialMock(Book::class, function (MockInterface $mock) {
            $mock->shouldReceive('save')
                ->once();
        });

        $data = [
            'title' => 'Viagem Ao Centro da Terra',
            'author' => 'Julio Verne',
        ];

        $bookData = new BookData($data);

        $user = new User();
        $user->id = 1;

        $book = $this->action->execute($bookData, $user);

        $this->assertInstanceOf(Book::class, $book);
        $this->assertTrue($book->available);

        $this->assertEquals('Viagem Ao Centro da Terra', $book->title);
        $this->assertEquals('Julio Verne', $book->author);
        $this->assertEquals(1, $book->user_id);
    }

    public function test_should_not_create_book_when_data_is_invalid()
    {
        $this->expectException(\TypeError::class);

        $this->partialMock(Book::class, function (MockInterface $mock) {
            $mock->shouldReceive('save')
                ->never();
        });

        $data = [
            'title' => (object)[],
            'author' => (object)[],
        ];

        $bookData = new BookData($data);
    }
}
