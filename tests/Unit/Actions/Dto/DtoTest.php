<?php

namespace Tests\Unit\Actions\Book;

use App\Dto\BookData;
use Tests\TestCase;

class DtoTest extends TestCase
{
    public function test_bookdata_dto_should_accept_strings_as_arguments()
    {
        $data = [
            'title' => 'A Tábula Redonda',
            'author' => 'Chrétien de Troyes',
        ];

        $bookData = new BookData($data);

        $this->assertInstanceOf(BookData::class, $bookData);
        $this->assertEquals('A Tábula Redonda', $bookData->title);
        $this->assertEquals('Chrétien de Troyes', $bookData->author);
    }

    public function test_bookdata_dto_should_only_accept_strings_as_arguments()
    {
        $this->expectException(\TypeError::class);

        $data = [
            'title' => (object)[],
            'author' => (object)[],
        ];

        $bookData = new BookData($data);
    }
}
