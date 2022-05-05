<?php

namespace Tests\Unit\Actions\Book;

use App\Actions\Book\MakeBookAvailableAction;
use App\Models\Book;
use Mockery\MockInterface;
use Tests\TestCase;

class MakeBookAvailableActionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->action = new MakeBookAvailableAction();
    }

    public function test_should_make_book_available()
    {
        $bookMock = $this->partialMock(Book::class, function (MockInterface  $mock){
            $mock->shouldReceive('save')->once()->andReturn(true);
        });

        $data = [
          'title' => 'Livro Teste',
          'author' => 'Autor Teste',
          'id' => 34,
          'user_id' => 12,
          'available' => false
        ];

        $bookMock->fill($data);

        $bookAns = $this->action->execute($bookMock);

        $this->assertTrue($bookAns->available);
    }
}
