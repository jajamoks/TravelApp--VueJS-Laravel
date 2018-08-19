<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'diet_has_restrictions',
        'diet_restrictions',
        'health_is_active',
        'health_has_injuries',
        'yoga_level',
        'health_injuries',
        'health_activities',
        'additional_info',
        'goals',
        'emergency_contact_name',
        'emergency_contact_phone',
        'emergency_contact_relationship',
        'birthday'
    ];

    protected $appends = [
        'complete'
    ];

    protected $dates = [
        'birthday'
    ];

    public function getCompleteAttribute()
    {
        $attrs = $this->attributes;
        return collect($attrs)->keys()->reduce(function ($acc, $curr) use ($attrs) {
            if (!$acc) {
                return $acc;
            }
            switch ($curr) {
                case 'yoga_level':
                    return !empty($attrs['yoga_level']);
                break;
                case 'emergency_contact_name':
                    return !empty($attrs['emergency_contact_name']);
                break;
                case 'emergency_contact_phone':
                    return !empty($attrs['emergency_contact_phone']);
                break;
                case 'emergency_contact_relationship':
                    return !empty($attrs['emergency_contact_relationship']);
                break;
                case 'goals':
                    return !empty($attrs['goals']);
                break;
                case 'birthday':
                    return !empty($attrs['birthday']);
                break;
                default:
                    return true;
                break;
            }
        }, true);
    }
}
