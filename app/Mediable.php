<?php

namespace App;

trait Mediable
{
    /**
     * Get all of the media for this model.
     */
    public function media()
    {
        return $this->morphToMany(Media::class, 'mediables', 'mediable_mediables');
    }
}
