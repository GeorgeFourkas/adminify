<?php

namespace App\Models\Adminify;

use App\Models\User;
use App\Traits\HasCategories;
use App\Traits\HasMedia;
use App\Traits\HasTags;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model implements TranslatableContract
{
    use Translatable, HasFactory, HasCategories, HasTags, HasMedia;

    protected $guard_name = 'web';

    public $translatedAttributes = ['title', 'body', 'slug'];

    protected $fillable = ['published', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categoryable');
    }
}
