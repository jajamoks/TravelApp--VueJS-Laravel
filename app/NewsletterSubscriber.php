<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Uuid;

class NewsletterSubscriber extends Model
{
    protected $fillable = [
        'subscriber_email',
        'verified',
        'verification_token'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->generateToken();
        });
    }

    private function generateToken()
    {
        $this->attributes['verification_token'] = Uuid::generate(4);
    }
}
