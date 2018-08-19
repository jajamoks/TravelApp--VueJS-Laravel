<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    protected $fillable = [
        'code',
        'amount',
        'type'
    ];

    public function discounts()
    {
        return $this->belongsToMany(Discount::class);
    }
}
