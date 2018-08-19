<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EscapeCart extends Model
{
    public $escape;
    public $sub_total;
    public $guests;
    public $room;
    public $rate;
    public $deposit_due;

    public function __construct($data)
    {
        $this->setCart($data);
    }

    private function subTotal($rate, $guests)
    {
        return $rate * $guests;
    }

    private function setCart($data)
    {
        $this->escape = Escape::findOrFail($data['escape_id']);
        $this->room = $data['room'];
        $this->guests = $data['guests'];
        $this->deposit = $this->escape->deposit_amount;
        $this->rate = $this->getRate();
        $this->sub_total = $this->subTotal(
            $this->rate,
            $this->guests
        );
        $this->deposit_due = $this->subTotal(
            $this->deposit,
            $this->guests
        );
        return $this;
    }


    public function getRate()
    {
        if ($this->room === 'shared') {
            return $this->escape->shared_rate;
        } elseif ($this->room === 'private') {
            if ($this->guests == 2) {
                return $this->escape->shared_rate;
            } else {
                return $this->escape->single_rate;
            }
        }
    }

    public function askForAdditionalGuestName()
    {
        return $this->guests > 1;
    }

    public function askForRoomateName()
    {
        return $this->guests == 1 && $this->room == 'shared';
    }

    public function getDisplayRateAttribute()
    {
        return $this->toDollars($this->rate);
    }

    public function getDisplayDepositAttribute()
    {
        return $this->toDollars($this->deposit_due);
    }

    public function getDisplaySubTotalAttribute()
    {
        return $this->toDollars($this->sub_total);
    }

    private function toDollars($value)
    {
        return $value / 100;
    }

    public function updateEscape($data)
    {
        return $this->setCart($data);
    }
}
