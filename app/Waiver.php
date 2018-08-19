<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waiver extends Model
{
    protected $fillable = [
        'name','signature','signed_on'
    ];

    protected $appends = [
        'is_signed'
    ];

    public function getIsSignedAttribute()
    {
        return !empty($this->signed_on) && !empty($this->name) && !empty($this->signature);
    }
}
