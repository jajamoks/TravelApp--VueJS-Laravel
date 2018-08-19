<?php

namespace App;

trait Testimoniable
{
    /**
     * Get all of the media for this model.
     */
    public function testimonials()
    {
        return $this->morphToMany(
            Testimonial::class,
            'testimonials',
            'testimonials_testimoniables'
        );
    }
}
