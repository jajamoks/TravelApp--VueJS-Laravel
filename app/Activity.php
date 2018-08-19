<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'link', 'event', 'description'
    ];

    public function scopeSorted()
    {
        return $this->orderBy('created_at', 'desc');
    }
}
