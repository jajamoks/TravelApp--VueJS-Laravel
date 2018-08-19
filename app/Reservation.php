<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reservation extends Model
{
    use Notifiable;

    private $payment;

    public function __construct(array $attrs = [])
    {
        parent::__construct($attrs);
        if (!isset(static::$booted[get_class($this)])) {
            static::boot();
            static::$booted[get_class($this)] = true;
        }
        $this->fill($attrs);
        $this->payment = \App::make('App\Payment');
    }

    protected $fillable = [
        'escape_id',
        'room_type',
        'guests',
        'email',
        'user_id',
        'total_balance',
        'gender',
        'roomate_name',
        'additional_guest_name',
    ];


    public function routeNotificationForMail()
    {
        return $this->user->email;
    }

    protected $with = [
        'flight', 'waiver'
    ];

    protected $appends = ['current_balance', 'has_required_info'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'reservation_id');
    }

    public function flight()
    {
        return $this->hasOne(Flight::class);
    }

    public function waiver()
    {
        return $this->hasOne(Waiver::class);
    }

    public function process(User $user, EscapeCart $cart, $userInput)
    {
        $userInput['charge_type'] = 'deposit';
        $userInput['charge_amount'] = $cart->deposit_due;
        $result = $this->payment->captureFunds($user, $userInput, $cart);
        if ($result['status'] === 'success') {
            $this->fill([
                'escape_id' => $cart->escape->id,
                'room_type' => $cart->room,
                'guests' => $cart->guests,
                'user_id' => Auth::user()->id,
                'total_balance' => $cart->sub_total,
                'gender' => $this->ifExists('gender', $userInput),
                'additional_guest_name' => $this->ifExists('additional_guest_name', $userInput),
                'roomate_name' => $this->ifExists('roomate_name', $userInput)
            ]);

            $this->save();
            $this->payment->fill([
                'reservation_id' => $this->id,
                'amount' => $result['transaction']['amount'],
                'auth_code' => $result['transaction']['auth_code'],
                'trans_id' => $result['transaction']['trans_id']
            ]);
            $this->payment->save();
            $this->applyDiscount($userInput);
            return $this;
        } else {
            return $result;
        }
    }


    public function getDisplayRoomTypeAttribute()
    {
        return ucwords($this->attributes['room_type']);
    }

    public function getDisplayCurrentBalanceAttribute()
    {
        return '$' . $this->current_balance / 100;
    }

    public function processBalance(User $user, $userInput)
    {
        $userInput['charge_type'] = 'balance';
        $userInput['charge_amount'] = $this->current_balance;
        //create a cart for this charge
        $cart = new EscapeCart([
            'escape_id' => $this->escape_id,
            'room' => $this->room_type,
            'guests' => $this->guests
        ]);
        $result = $this->payment->captureFunds($user, $userInput, $cart);
        if ($result['status'] === 'success') {
            $this->payment->fill([
                'reservation_id' => $this->id,
                'amount' => $result['transaction']['amount'],
                'auth_code' => $result['transaction']['auth_code'],
                'trans_id' => $result['transaction']['trans_id']
            ]);
            $this->payment->save();
            return $this->payment;
        } else {
            return $result;
        }
    }

    public function getCurrentBalanceAttribute()
    {
        $payments = $this->payments->reduce(function ($acc, $curr) {
            return $acc + $curr['amount'];
        }, 0);
        return $this->total_balance - $payments;
    }

    private function ifExists($key, $array)
    {
        return isset($array[$key]) ? $array[$key] : null;
    }

    /**
     * Escape Relationship
     *
     * Implements belongsTo relationship with App\Escape
     *
     * @return Eloquent\Relationship\belongsTo
     */
    public function escape()
    {
        return $this->belongsTo(Escape::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    private function applyDiscount($input)
    {
        if (isset($input['discount_code']) && !empty($input['discount_code'])) {
            $code = DiscountCode::where('code', $input['discount_code'])->get()->first();
            $this->discounts()->create([
                'discount_code_id' => $code->id,
                'reservation_id' => $this->id
            ]);
            if ($code->type === 'set_value') {
                $newBalance = $this->total_balance - $code->amount;
            } elseif ($code->type === 'percentage') {
                $newBalance = $this->total_balance - (
                    ($code->amount/100) * $this->total_balance
                );
            } else {
                $newBalance = $cart->sub_total;
            }
            $this->total_balance = $newBalance;
            $this->save();
        }
    }

    public function getHasRequiredInfoAttribute()
    {
        return collect([
            $this->user->profile->complete,
            $this->waiver,
            $this->flight
        ])->reduce(function ($acc, $curr) {
            if(!$acc) {
                return $acc;
            } else {
                return $curr !== null;
            }
        }, true);

    }
}
