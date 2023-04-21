<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;


class Category extends Model implements TranslatableContract
{

    use HasFactory, Translatable, HasRecursiveRelationships;

    protected $fillable = ['parent_id'];


    public $translatedAttributes = ['name'];

}
