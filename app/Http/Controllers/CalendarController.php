<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escape;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function index()
    {
        $escapes = (new Escape)->valid()->sorted()->get();

        $options_date = $escapes->map(function ($escape) {
            return [
                'value' => Carbon::parse($escape->start_date)->format('F Y'),
                'label' =>  Carbon::parse($escape->start_date)->format('F Y'),
            ];
        });
        $options_destination = $escapes->unique(function ($escape) {
            return $escape->escape_type->location;
        })->map(function ($escape) {
            return [
                'value' => $escape->escape_type->location,
                'label' => $escape->escape_type->location
            ];
        });
        return view('pages.calendar.index', [
            'escapes' => $escapes,
            'options_date' => $options_date,
            'options_destination' => $options_destination
        ]);
    }
}
