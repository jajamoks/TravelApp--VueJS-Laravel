<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'date',
        'approved',
        'content'
    ];

    protected $dates = ['date'];

    protected $appends = ['display_date'];

    public function escapeType()
    {
        return $this->belongsTo(App\EscapeType::class);
    }

    public function getDisplayDateAttribute()
    {
        return $this->date->format('F j, Y');
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }
}
