<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Book extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $fillable = [
        'id', 'title', 'author', 'available', 'user_id'
    ];
    /**
     * @var int|mixed
     */
    private $user_id;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function borrow()
    {
        return $this->hasOne(Borrow::class);
    }

    public function getCoverImageUrl()
    {
        return optional($this->getFirstMedia('cover'))
            ->getFullUrl();
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')
            ->singleFile();
    }
}
