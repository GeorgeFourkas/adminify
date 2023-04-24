<?php

namespace App\Models\Adminify;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model implements TranslatableContract
{
    use HasFactory, Translatable, HasRecursiveRelationships;

    protected $fillable = ['parent_id'];

    public $translatedAttributes = ['name'];
}
