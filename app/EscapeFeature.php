<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscapeFeature extends Model
{
    protected $fillable = [
        'content',
        'order'
    ];
}
