<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Escape extends Model
{

    use Sluggable;
    use Mediable;
    use SoftDeletes;


    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->itinerary()->create([]);
            $model->packingList()->create([]);
            $model->readingList()->create([]);
        });
    }


    protected $with = [
        'itinerary.activities',
        'packingList.items',
        'readingList.items'
    ];

    protected $appends = [
        'escape_type',
        'available_shared_rooms',
        'available_single_rooms',
        'display_date',
        'brochure',
        'short_display_date'
    ];

    protected $fillable = [
        'single_rooms',
        'single_rate',
        'shared_rooms',
        'shared_rate',
        'start_date',
        'end_date',
        'deposit_amount',
        'escape_type_id',
        'payment_due',
        'contact_info'
    ];

    protected $dates = ['start_date', 'end_date', 'payment_due'];


    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
    public function sluggable()
    {
        return [
           'slug' => [
               'source' => ['escape_type.country', 'escape_type.name']
           ]
        ];
    }

    public function scopeValid($query)
    {
        $query->where('start_date', '>', Carbon::today()->toDateString());
        $query->whereHas('type.media', function ($q) {
            return $q->where('mediable_mediables.type', 'featured_image');
        });
        return $query;
    }

    public function scopePast($query)
    {
        $query->where('start_date', '<=', Carbon::today()->toDateString());
        return $query;
    }

    public function scopeSorted($query)
    {
        $query->orderBy('start_date', 'asc');
        return $query;
    }

    public function type()
    {
        return $this->belongsTo('App\EscapeType', 'escape_type_id');
    }

    public function getBrochureAttribute()
    {
        return $this->media()->wherePivot('type', 'brochure')->get()->first();
    }

    /**
     * isReservable
     *
     * validates whether a reservation can be created for this escape
     * based on available rooms, date, and number of guests
     *
     * @return return boolean
     */
    public function isReservable()
    {
        //check date is not beyond deposit due date
        $dateIsValid = $this->start_date->gt(Carbon::now());
        if ($dateIsValid) {
            //check if available shared rooms
            if ($this->available_shared_rooms > 0) {
                //trip is reservable
                return true;
            }
            //check if available private rooms
            if ($this->available_single_rooms > 0) {
                //trip is not reservable
                return true;
            }
        }
        //trip is not reservable
        return false;
    }

    public function getAvailableSingleRoomsAttribute()
    {
        $current = $this->reservations->where('room_type', 'private')->count();
        return $this->single_rooms - $current;
    }

    public function getAvailableSharedRoomsAttribute()
    {
        $current = $this->reservations->where('room_type', 'shared')
                    ->reduce(function ($acc, $curr) {
                        return $acc + $curr->guests;
                    }, 0);
        return $this->shared_rooms - $current;
    }

    /**
     * Reservation Relationship
     *
     * Implements hasMany relationship
     *
     * @return Eloquent\Relationship\hasMany
     */
    public function reservations()
    {
        return $this->hasMany(Reservation::class, 'escape_id');
    }

    public function itinerary()
    {
        return $this->hasOne(EscapeItinerary::class);
    }

    public function packingList()
    {
        return $this->hasOne(EscapePackingList::class);
    }

    public function readingList()
    {
        return $this->hasOne(EscapeReadingList::class);
    }

    public function getEscapeTypeAttribute()
    {
        return $this->type()->first();
    }

    public function getDisplaySingleRateAttribute()
    {
        return $this->attributes['single_rate'] / 100;
    }

    public function getDisplaySharedRateAttribute()
    {
        return $this->attributes['shared_rate'] / 100;
    }

    public function getDisplayDepositAttribute()
    {
        return $this->attributes['deposit_amount'] / 100;
    }

    public function getDisplayPaymentDueAttribute()
    {
        return Carbon::parse($this->attributes['payment_due'])->format('F jS, Y');
    }

    public function getDisplayDateAttribute()
    {
        $start = Carbon::parse($this->attributes['start_date'])->format('F jS, Y');
        $end = Carbon::parse($this->attributes['end_date'])->format('F jS, Y');
        return "${start} - ${end}";
    }

    public function getDisplayStartDateAttribute()
    {
        return Carbon::parse($this->attributes['start_date'])->format('F jS, Y');
    }

    public function getShortDisplayDateAttribute()
    {
        $start = Carbon::parse($this->attributes['start_date']);
        $end = Carbon::parse($this->attributes['end_date']);
        $sameMonth = $start->isSameMonth($end);
        $sameYear = $start->isSameYear($end);
        if ($sameMonth) {
            $monthFormatted = $start->format('F');
            $startFormatted = $start->format('jS ');
            $endFormatted = $end->format('jS');
            $yearFormatted = $start->format('Y');
            return "${monthFormatted} ${startFormatted} - ${endFormatted}, ${yearFormatted}";
        } elseif ($sameYear) {
            $startFormatted = $start->format('M jS ');
            $endFormatted = $end->format('M jS');
            $yearFormatted = $start->format('Y');
            return "${startFormatted} - ${endFormatted}, ${yearFormatted}";
        } else {
            $startFormatted = $start->format('M jS Y ');
            $endFormatted = $end->format('M jS Y');
            return "${startFormatted} - ${endFormatted}";
        }
    }

    public function getLengthAttribute()
    {
        return $this->end_date->diffInDays($this->start_date) === 0 ? 1 : $this->end_date->diffInDays($this->start_date) + 1;
    }
}
