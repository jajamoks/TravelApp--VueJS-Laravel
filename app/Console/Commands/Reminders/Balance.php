<?php

namespace App\Console\Commands\Reminders;

use Illuminate\Console\Command;
use App\Reservations;
use App\Escape;
use Carbon\Carbon;
use App\Notifications\BalanceReminder;
use Illuminate\Support\Facades\Log;

class Balance extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:balance';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = Carbon::now()->startOfDay();
        $date->addDays(7);
        $escapes = Escape::where('payment_due', '=', $date->toDateTimeString())->get();
        if (count($escapes) > 0) {
            $outstanding = $this->getOutstandingReservations($escapes);
            Log::info('sending '. count($outstanding). ' reminders');
            $outstanding->each(function ($reservation) {
                $reservation->notify(new BalanceReminder($reservation));
            });
        } else {
            Log::info('sending no reminders');
        }
    }

    private function getOutstandingReservations($escapes)
    {
        return $escapes->reduce(function ($outstanding, $escape) {
            $reservations = $escape->reservations->filter(function ($res) {
                return $res->current_balance > 0;
            });
            return $outstanding->merge($reservations);
        }, collect([]));
    }
}
