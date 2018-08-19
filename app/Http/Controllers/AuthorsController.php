<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthorsController extends Controller
{
    public function index()
    {
        return User::where('role', 'admin')->get();
    }
}
