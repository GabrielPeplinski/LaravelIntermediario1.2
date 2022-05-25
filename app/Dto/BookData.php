<?php

namespace App\Dto;

use Spatie\DataTransferObject\DataTransferObject;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class BookData extends DataTransferObject
{
    /** @var string  */
    public string $title;

    /** @var string  */
    public string $author;

   /** @var string|Media */
    public $image;
}
