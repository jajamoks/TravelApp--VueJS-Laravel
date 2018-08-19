<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = [
        'arrival_airline',
        'departure_airline',
        'arrival_flight_number',
        'departure_flight_number',
        'arrival_date',
        'departure_date',
        'arrival_airport',
        'departure_airport'
    ];

    protected $dates = [
        'arrival_date',
        'departure_date'
    ];
}
