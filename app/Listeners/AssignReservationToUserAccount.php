<?php

namespace App\Listeners;

use App\Events\SuccessfulReservation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class CreateUserAccount
{
    private $user;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  SuccessfulReservation  $event
     * @return void
     */
    public function handle(SuccessfulReservation $event)
    {
        //
    }
}
