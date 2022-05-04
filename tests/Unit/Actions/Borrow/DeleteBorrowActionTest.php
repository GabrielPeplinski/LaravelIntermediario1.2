<?php

namespace Tests\Unit\Actions\Borrow;

use App\Actions\Borrow\DeleteBorrowAction;
use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
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
        $borrowMock = $this->createMock(Borrow::class);

        $borrowMock->expects($this->once())->method('delete')->willReturn(true);

        $this->action->execute($borrowMock);
    }
}
