<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->profile()->create([]);
        });
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'address',
        'city',
        'state',
        'zip',
        'country'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $with = ['profile'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function getFullNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function createOrLogin($request)
    {
        if (!Auth::check()) {
            $user = $this->where('email', $request->get('email'))->first();
            if (!$user) {
                $this->fill([
                    'name' => $request->get('email'),
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'address' => $request->get('address'),
                    'city' => $request->get('city'),
                    'state' => $request->get('state'),
                    'zip' => $request->get('zip'),
                    'country' => $request->get('country'),
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password'))
                ])->save();
                Auth::login($this);
                return true;
            } else {
                if (Auth::attempt([
                    'email' => $request->get('email'),
                    'password' => $request->get('password')
                ])) {
                    //update the user with the current values
                    $user->fill([
                        'name' => $request->get('email'),
                        'first_name' => $request->get('first_name'),
                        'last_name' => $request->get('last_name'),
                        'address' => $request->get('address'),
                        'city' => $request->get('city'),
                        'state' => $request->get('state'),
                        'zip' => $request->get('zip'),
                        'country' => $request->get('country'),
                        'email' => $request->get('email')
                    ])->save();
                    //log them in
                    Auth::login($user);
                    return true;
                } else {
                    //auth failed
                    return false;
                }
            }
        }
        //update the user with the current values
        Auth::user()->fill([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'state' => $request->get('state'),
            'zip' => $request->get('zip'),
            'country' => $request->get('country'),
        ])->save();
        return true;
    }
}
