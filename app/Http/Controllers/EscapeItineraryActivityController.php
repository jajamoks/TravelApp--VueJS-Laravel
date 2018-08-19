<?php

namespace App\Http\Controllers;

use App\EscapeActivity;
use App\Escape;
use App\EscapeItinerary;
use Illuminate\Http\Request;

class EscapeItineraryActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Escape  $escape
     * @return \Illuminate\Http\Response
     */
    public function index(
        Escape $escape,
        EscapeItinerary $itinerary
    ) {
        return $itinerary->activities;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Escape  $escape
     * @return \Illuminate\Http\Response
     */
    public function create(
        Escape $escape,
        EscapeItinerary $itinerary
    ) {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escape  $escape
     * @return \Illuminate\Http\Response
     */
    public function store(
        Request $request,
        Escape $escape,
        EscapeItinerary $itinerary
    ) {
        $startDate = $escape->start_date;
        $endDate = $escape->end_date->addDay();
        //dd($request->get('date'));
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required|before:'.$endDate.'|after:'.$startDate
        ]);
        $itinerary->activities()->create($request->all());
        return $itinerary->activities;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Escape  $escape
     * @param  \App\EscapeActivity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(
        Escape $escape,
        EscapeItinerary $itinerary,
        EscapeActivity $activity
    ) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Escape  $escape
     * @param  \App\EscapeActivity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(
        Escape $escape,
        EscapeItinerary $itinerary,
        EscapeActivity $activity
    ) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escape  $escape
     * @param  \App\EscapeActivity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(
        Request $request,
        Escape $escape,
        EscapeItinerary $itinerary,
        EscapeActivity $activity
    ) {
        $startDate = $escape->start_date;
        $endDate = $escape->end_date;
        $this->validate($request, [
            'name' => 'required',
            'date' => 'required|before:'.$endDate.'|after:'.$startDate
        ]);
        $result = $activity->update($request->all());
        return $itinerary->activities;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escape  $escape
     * @param  \App\EscapeActivity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(
        Escape $escape,
        EscapeItinerary $itinerary,
        EscapeActivity $activity
    ) {
        $activity->delete();
        return $itinerary->activities;
    }
}
