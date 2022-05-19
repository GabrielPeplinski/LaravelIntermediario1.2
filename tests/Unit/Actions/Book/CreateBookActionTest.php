<?php

namespace Tests\Unit\Actions\Book;

use App\Actions\Book\CreateBookAction;
use App\Actions\Book\IsValidAction;
use App\Models\Book;
use App\Models\User;
use Mockery\MockInterface;
use Tests\TestCase;

class CreateBookActionTest extends TestCase
{
    protected function setUp():void
    {
        parent::setUp();
        $this->action = new CreateBookAction();
    }

    public function test_should_create_book_when_valid_data()
    {
        $this->partialMock(Book::class, function(MockInterface $mock){
            $mock->shouldReceive('save')
                ->once();
        });

        $data = [
            'title'=>'Viagem Ao Centro da Terra',
            'author'=>'Julio Verne',
        ];

        $user = new User();
        $user->id = 1;

        $ans = (new IsValidAction())->execute($data);

        if($ans){
            $book = $this->action->execute($data, $user);
        }

        $this->assertInstanceOf(Book::class, $book);
        $this->assertTrue($book->available);

        $this->assertEquals('Viagem Ao Centro da Terra', $book->title);
        $this->assertEquals('Julio Verne', $book->author);
        $this->assertEquals(1, $book->user_id);
    }

    public function test_should_not_create_book_when_data_is_invalid()
    {

        $this->partialMock(Book::class, function(MockInterface $mock){
            $mock->shouldReceive('save')
                ->never();
        });

        $data = [
            'title'=>'Viagem Ao Centro da Terra',
            'author'=> 1111,
        ];

        $user = new User();
        $user->id = 1;

        $ans = (new IsValidAction())->execute($data);

        if($ans){
            $book = $this->action->execute($data, $user);
        }

        $this->assertFalse((new IsValidAction())->execute($data));
    }
}
