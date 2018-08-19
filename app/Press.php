<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentTaggable\Taggable;
use Carbon\Carbon;
use Auth;

class Press extends Model
{
    use Mediable;
    use Sluggable;
    use Taggable;

    protected $guarded = [];
    protected $fillable = [
        'title',
        'link',
        'date',
        'content',
        'image_alt'
    ];

    protected $dates = ['date'];
    protected $table = 'press';
    protected $appends = ['image', 'attachment', 'display_date'];

    public function scopeSorted($query)
    {
        $query->orderBy('date', 'DESC');
        return $query;
    }

    public function columnLayout()
    {
        $press = $this->sorted()->get();
        $col1 = $press->nth(3);
        $col2 = $press->nth(3, 1);
        $col3 = $press->nth(3, 2);
        return $col1->merge($col2, $col3)->all();
    }

    public function getDisplayDateAttribute()
    {
        return Carbon::parse($this->attributes['date'])->format('F Y');
    }

    public function getImageAttribute()
    {
        $media = $this->media()
            ->wherePivot('type', '<>', 'attachment')
            ->first();
        if ($media) {
            return $media;
        } else {
            return null;
        }
    }

    public function getAttachmentAttribute()
    {
        $media = $this->media()
            ->wherePivot('type', 'attachment')
            ->first();
        if ($media) {
            return $media;
        } else {
            return null;
        }
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

    public function saveAttachment($id)
    {
        $allMedia = [];
        $currentImage = $this->media()
            ->wherePivot('type', '<>', 'attachment')
            ->first();
        $allMedia[$id] = ['type' => 'attachment'];
        if ($currentImage) {
            $allMedia[$currentImage->id] = ['type' => 'featured_image'];
        }
        $this->media()->sync($allMedia);
    }

    public function saveImage($id)
    {
        $allMedia = [];
        $currentAttachment = $this->media()
            ->wherePivot('type', 'attachment')
            ->first();
        if ($currentAttachment) {
            $allMedia[$currentAttachment->id] = ['type' => 'attachment'];
        }
        $allMedia[$id] = ['type' => 'featured_image'];
        $this->media()->sync($allMedia);
    }

    /**
     * Get the content excerpt
     */
    public function getSafeTitleAttribute()
    {
        if (strlen($this->attributes['title']) <= 40) {
            return $this->attributes['title'];
        } else {
            return substr($this->attributes['title'], 0, 37) . "...";
        }
    }

    /**
     * Get the content excerpt
     */
    public function getExcerptAttribute()
    {
        return strip_tags(substr($this->attributes['content'], 0, 400) . "...");
    }

    public function getSummaryAttribute()
    {
        $split = preg_split('/(\.|\!|\?)/', $this->content, 3, PREG_SPLIT_DELIM_CAPTURE);
        $custom_desc = implode('', array_slice($split, 0, 4));
        return strip_tags($custom_desc) . '...';
    }

    public function getImage($width = 740)
    {
        $media = $this->media()->first();
        if ($media) {
            return str_replace(
                'v' . $media->version,
                'c_limit,w_' . $width,
                $media->secure_url
            );
        } else {
            if (isset($this->attributes['featured_image'])) {
                return $this->attributes['featured_image'];
            } else {
                return null;
            }
        }
    }
}
