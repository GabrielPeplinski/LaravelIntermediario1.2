<?php

namespace Tests\Unit\Actions\Borrow;

use App\Actions\Book\MakeBookAvailableAction;
use App\Actions\Borrow\DeleteBorrowAction;
use App\Models\Book;
use App\Models\Borrow;
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
        $this->partialMock(MakeBookAvailableAction::class, function (MockInterface $mock){
            $mock->shouldReceive('execute')->once();
        });

        $borrowMock = $this->partialMock(Borrow::class, function (MockInterface  $mock){
            $mock->shouldReceive('delete')->once()->andReturn(true);
        });

        $borrowMock->setRelation('book', new Book());

        $this->action->execute($borrowMock);
    }
}
