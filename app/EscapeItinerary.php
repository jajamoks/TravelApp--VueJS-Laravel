<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscapeItinerary extends Model
{
    protected $fillable = [
        'content'
    ];

    public function activities()
    {
        return $this->hasMany(EscapeActivity::class);
    }
}
