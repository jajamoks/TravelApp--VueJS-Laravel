<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;

class EscapeType extends Model
{
    use Mediable;
    use Taggable;
    use Testimoniable;

    protected $fillable = [
        'name',
        'description',
        'accomodations',
        'country',
        'region',
        'itinerary',
        'wellness_summary',
        'nutrition_summary',
        'give_back_summary',
        'home_summary',
        'unique_summary',
        'insurance_required'
    ];
    protected $appends = [
        'gallery',
        'featured_image',
        'escape_features',
        'escape_testimonials',
        'escape_teachers',
        'location'
    ];

    /**
     * Get the featured image for this Escape Type.
     */
    public function getFeaturedImageAttribute()
    {
        $image = $this->media()->wherePivot('type', 'featured_image')->get()->first();
        return $image;
    }

    public function getEscapeFeaturesAttribute()
    {
        return $this->features->sortBy('order')->values();
    }

    public function getEscapeTestimonialsAttribute()
    {
        return $this->testimonials->first();
    }

    public function getEscapeTeachersAttribute()
    {
        return $this->teachers;
    }

    public function saveImages($featured, $gallery)
    {
        $syncs = collect($gallery)->reduce(function ($acc, $curr) {
            $acc[$curr['id']] = [
                'type' => 'gallery',
                'order' => isset($curr['order']) ? $curr['order'] : $curr['pivot']['order']
            ];
            return $acc;
        }, []);
        if (isset($featured['id'])) {
            $syncs[$featured['id']] = ['type' => 'featured_image'];
        }
        $this->media()->sync($syncs);
    }

    public function getGalleryAttribute()
    {
        return $this->media()
                ->wherePivot('type', '<>', 'featured_image')
                ->withPivot('order', 'type')
                ->get()
                ->sortBy('pivot.order')
                ->values();
    }

    /**
     * Get the featured image for this Escape Type.
     */
    public function getLocationAttribute()
    {
        return $this->region .', '. $this->country;
    }

    /**
     * Escape Relationship
     */
    public function escapes()
    {
        return $this->hasMany(Escape::class);
    }

    /**
     * Features Relationship
     */
    public function features()
    {
        return $this->hasMany(EscapeFeature::class);
    }

    /**
     * Teachers Relationship
     */
    public function teachers()
    {
        return $this->belongsToMany(TeamMember::class)
            ->withPivot('order')
            ->orderBy('order', 'asc');
    }
}
