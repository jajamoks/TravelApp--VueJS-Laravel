<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentTaggable\Taggable;
use Spatie\Feed\FeedItem;
use Carbon\Carbon;
use Auth;

class Post extends Model implements FeedItem
{
    use Taggable;
    use Sluggable;
    use SoftDeletes;
    use Mediable;

    protected $guarded = [];
    protected $fillable = [
        'title',
        'content',
        'published_date',
        'user_id',
        'post_category_id',
        'featured_image'
    ];

    /**
    * Get the category associated with the Post
    */
    public function post_category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    /**
    * Get the author who wrote the Post
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * Get the content excerpt
    */
    public function getExcerptAttribute()
    {
        return strip_tags(substr($this->attributes['content'], 0, 400)."...");
    }

    /**
    * Get the content excerpt
    */
    public function getSafeTitleAttribute()
    {
        if (strlen($this->attributes['title']) <= 40 ) {
            return $this->attributes['title'];
        } else {
            return substr($this->attributes['title'], 0, 37)."...";
        }
    }

    /**
    * Get the content excerpt
    */
    public function getDisplayDateAttribute()
    {
        return Carbon::parse($this->attributes['published_date'])->format('F jS, Y');
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

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("title", "LIKE", "%$keyword%")
                    ->orWhere("content", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }

    public function scopePublished($query)
    {
        //allow admin to see unpublished posts
        if(Auth::user() && Auth::user()->role == 'admin') {
            return $query;
        }
        $query->where(function ($query) {
            $query->whereNotNull('published_date')
                    ->whereDate('published_date', '<=', Carbon::today()->toDateString());
        });
        return $query;
    }

    public function scopeSorted($query)
    {
        $query->orderByRaw('published_date IS NULL DESC, published_date DESC');
        return $query;
    }

    public function scopeByDate($query)
    {
        $query->orderBy('published_date', 'DESC');
        return $query;
    }

    public function getImage($width = 740)
    {
        $media = $this->media()->first();
        if ($media) {
            return str_replace(
                'v'.$media->version,
                'c_limit,w_'.$width,
                $media->secure_url
            );
        } else {
            return $this->attributes['featured_image'];
        }
    }

    public function getSummaryAttribute()
    {
        $split = preg_split('/(\.|\!|\?)/', $this->content, 3, PREG_SPLIT_DELIM_CAPTURE);
        $custom_desc = implode('', array_slice($split, 0, 4));
        return strip_tags($custom_desc) . '...';
    }
    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at', 'published_date'];

    public function getFeedItemId()
    {
        return $this->id;
    }

    public function getFeedItemTitle() : string
    {
        return $this->title;
    }

    public function getFeedItemSummary() : string
    {
        return "<img src='{$this->featured_image}' alt='{$this->title}' /> " . $this->summary;
    }

    public function getFeedItemUpdated() : Carbon
    {
        return $this->updated_at;
    }

    public function getFeedItemLink() : string
    {
        return action('BlogController@showPost', [$this->slug]);
    }

    public function getFeedItemAuthor() : string
    {
        return $this->user->full_name;
    }

    public function getFeed()
    {
        return $this->published()
                    ->with('user', 'post_category')
                    ->orderBy('published_date', 'desc')->get();
    }
}
