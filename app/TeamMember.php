<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Model
{
    use Mediable;
    use SoftDeletes;

    protected $guarded = [];
    protected $fillable = [
        'name',
        'credentials',
        'bio',
        'twitter_url',
        'linkedin_url',
        'facebook_url',
        'gplus_url'
    ];

    protected $appends = ['media'];
    /**
    * Get the image_url from attached media
    */
    public function getMediaAttribute()
    {
        return $this->media()->first();
    }

    public function getImage($width = 740)
    {
        $media = $this->media()->first();
        $imageWidth = $width*2;
        if ($media) {
            return str_replace(
                'v'.$media->version,
                "w_{$imageWidth},h_{$imageWidth},c_crop,g_face,r_max/w_{$width}",
                $media->secure_url
            );
        }
    }

    public function escapeTypes()
    {
        return $this->belongsToMany(App\EscapeTypes);
    }
}
