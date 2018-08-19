<?php

namespace App\Http\Controllers;

use App\Waiver;
use App\Reservation;
use Illuminate\Http\Request;

class ReservationWaiverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function index(Reservation $reservation)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function create(Reservation $reservation)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Reservation $reservation)
    {
        $this->validate($request, [
            'name' => 'required',
            'signature' => 'required',
            'signed_on' => 'required',
            'signature_confirmed' => 'required'
        ]);
        $reservation->waiver()->create($request->all());
        return $reservation->fresh();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @param  \App\Waiver  $waiver
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation, Waiver $waiver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @param  \App\Waiver  $waiver
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation, Waiver $waiver)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @param  \App\Waiver  $waiver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation, Waiver $waiver)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @param  \App\Waiver  $waiver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation, Waiver $waiver)
    {
        //
    }
}
