<?php

namespace App\Models\Adminify;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Storage;
use Zoha\Metable;

class PostTranslation extends Model
{
    use Metable, Sluggable;

    protected $with = ['media', 'meta'];

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
                'source' => 'title',
            ],
        ];
    }

    public function media(): MorphToMany
    {
        return $this->morphToMany(Media::class, 'mediable');
    }
}
