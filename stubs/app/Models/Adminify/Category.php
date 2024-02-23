<?php

namespace App\Models\Adminify;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model implements TranslatableContract
{
    use HasFactory, HasRecursiveRelationships, Translatable;

    protected $fillable = ['parent_id'];

    public $translatedAttributes = ['name'];

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'categoryable');
    }

    public function isRootCategory(): bool
    {
        return is_null($this->parent_id);
    }
}
