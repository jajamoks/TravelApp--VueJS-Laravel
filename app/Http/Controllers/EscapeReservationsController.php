<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escape;
use App\Reservation;
use App\Notifications\{
    MissingInfoReminder,
    BalanceReminder
};

class EscapeReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $escape = Escape::findOrFail($id);
        return $escape->reservations->load('payments')->load('user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Escape $escape, Reservation $reservation)
    {
        $reservation->update($request->all());
        return $reservation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function sendBalanceReminder(Request $request, Escape $escape, Reservation $reservation)
    {
        $reservation->notify(new BalanceReminder($reservation));
    }

    public function sendMissingInfoReminder(Request $request, Escape $escape, Reservation $reservation)
    {
        $reservation->notify(new MissingInfoReminder($reservation));
    }
}
