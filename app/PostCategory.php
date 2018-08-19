<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PostCategory extends Model
{
    use Sluggable;

    protected $guarded = [];

    /*
    * Get the posts for this Category
    *
    */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
