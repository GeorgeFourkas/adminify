<?php

namespace App\Models\Adminify;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Zoha\Metable;

class PostTranslation extends Model
{
    use Metable, Sluggable;

    protected $with = ['meta'];

    public $timestamps = false;

    protected $fillable = ['title', 'body', 'slug', 'locale'];

    protected function featuredImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => Storage::url(Storage::put('public/posts', $value)),
        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'slug'
            ],
        ];
    }


    public function getSlugAttribute(): string
    {
        return is_null($this->title) ? str()->random(10) : $this->title;
    }


}
