<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payment extends Model
{
    protected $table = 'payments';
    protected $fillable = [
        'reservation_id',
        'amount',
        'auth_code',
        'trans_id'
    ];

    public function captureFunds(User $user, $paymentInfo, EscapeCart $cart)
    {
        $authorizeTransaction = \App::make(AuthorizeTransaction::class);
        $newTransaction = $authorizeTransaction($user, $paymentInfo, $cart);
        return $newTransaction->run();
    }

    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

    public function getDisplayAmountAttribute()
    {
        return '$' . $this->amount / 100;
    }

    public function getDisplayDateAttribute()
    {
        return $this->created_at->format('F j, Y');
    }
}
