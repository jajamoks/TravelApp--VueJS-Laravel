<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TravelResourcesController extends Controller
{
    public function index()
    {
        return view('public.pages.resources');
    }
}
