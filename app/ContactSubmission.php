<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'name',
        'message',
        'email',
        'interest',
        'phone',
        'source',
        'zip'
    ];


    /**
     * Scope for ContactSubmissions ordered by descending date
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
    */

    public function scopeSortedByDate($query)
    {
        $query->orderBy('created_at', 'desc');
        return $query;
    }
}
