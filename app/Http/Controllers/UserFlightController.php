<?php

namespace App\Http\Controllers;

use App\Flight;
use App\Reservation;
use Illuminate\Http\Request;

class UserFlightController extends Controller
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
            'arrival_airline' => 'required',
            'departure_airline' => 'required',
            'arrival_flight_number' => 'required',
            'departure_flight_number' => 'required',
            'arrival_date' => 'required',
            'departure_date' => 'required',
            'arrival_airport' => 'required',
            'departure_airport' => 'required'
        ]);
        $reservation->flight()->create($request->all());
        return $reservation->fresh()->flight;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation, Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reservation  $reservation
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation, Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Reservation $reservation,
        Flight $flight
    ) {
        $this->validate($request, [
            'arrival_airline' => 'required',
            'departure_airline' => 'required',
            'arrival_flight_number' => 'required',
            'departure_flight_number' => 'required',
            'arrival_date' => 'required',
            'departure_date' => 'required',
            'arrival_airport' => 'required',
            'departure_airport' => 'required'
        ]);
        $flight->update($request->all());
        return $flight;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation, Flight $flight)
    {
        //
    }
}
