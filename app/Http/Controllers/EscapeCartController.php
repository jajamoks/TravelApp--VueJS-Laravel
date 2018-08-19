<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EscapeCart;

class EscapeCartController extends Controller
{
    /**
     * Store a newly created cart in session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'escape_id' => 'required',
            'guests' => 'required|numeric',
            'room' => 'required'
        ]);
        if ($request->session()->has('escape_cart')) {
            $cart = session('escape_cart')->updateEscape($request->all());
        } else {
            $cart = new EscapeCart($request->all());
        }
        session(['escape_cart' => $cart]);
        return redirect('reservations');
    }
}
