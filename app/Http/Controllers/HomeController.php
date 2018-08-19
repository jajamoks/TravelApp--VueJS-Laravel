<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escape;
use Cache;

class HomeController extends Controller
{
    public function index()
    {
        $instagram = json_decode(Cache::get('instagram'));
        return view('pages.home.index', [
            'instagram' => $instagram
        ]);
    }
}
