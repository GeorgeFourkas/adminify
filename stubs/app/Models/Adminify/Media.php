<?php

namespace App\Models\Adminify;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'size', 'extension', 'user_id', 'width', 'height', 'original_name'];

    protected $hidden = ['pivot'];


    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'mediable');
    }

    public function posts(): MorphToMany
    {
        return $this->morphedByMany(Post::class, 'mediable');
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
