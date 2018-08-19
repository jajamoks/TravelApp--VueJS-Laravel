<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'discount_code_id',
        'reservation_id'
    ];

    public function reservation()
    {
        return $this->belongsTo(App\Reservation::class);
    }

    public function discountCode()
    {
        return $this->belongsTo(App\DiscountCode::class);
    }
}
