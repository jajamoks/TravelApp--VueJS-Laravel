<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscapeActivity extends Model
{
    protected $fillable = [
        'name', 'date', 'description'
    ];

    protected $dates = [
        'date'
    ];

    protected $appends = [
        'time'
    ];

    public function getTimeAttribute()
    {
        return $this->date->format('g:iA');
    }
}
