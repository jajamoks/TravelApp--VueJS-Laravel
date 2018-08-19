<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use App\Events\SuccessfulReservation;
use Illuminate\Support\Facades\Auth;

class ReservationsController extends Controller
{
    protected $reservation;
    protected $user;

    public function __construct(Reservation $reservation, User $user)
    {
        $this->reservation = $reservation;
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $this->prefillCustomerInfo();
        }
        return view('pages.reservations.index', [
            'cart' => session('escape_cart')
        ]);
    }

    private function prefillCustomerInfo()
    {
        session()->put('_old_input.first_name', Auth::user()->first_name);
        session()->put('_old_input.last_name', Auth::user()->last_name);
        session()->put('_old_input.address', Auth::user()->address);
        session()->put('_old_input.city', Auth::user()->city);
        session()->put('_old_input.state', Auth::user()->state);
        session()->put('_old_input.country', Auth::user()->country);
        session()->put('_old_input.zip', Auth::user()->zip);
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
        $cart = session('escape_cart');
        if (empty($cart)) {
            return redirect('reservations');
        }
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'country' => 'required',
            'gender' => $this->shouldRequireGender($cart),
            'email' => !Auth::check() ? 'required|email' : '',
            'password' => !Auth::check() ? 'required' : '',
            'credit_card_number' => 'required|digits_between:13,19',
            'expiration_month' => 'required|digits_between:1,2',
            'expiration_year' => 'required|digits:4',
            'cvv_code' => 'required|digits_between:3,4',
            'discount_code' => 'nullable|exists:discount_codes,code'
        ]);

        $login = $this->user->createOrLogin($request);
        if ($login) {
            // user was successfully logged in
            $requestData = $request->all();
            //pad month if only one digit supplied
            if(strlen($requestData['expiration_month']) == 1) {
                $requestData['expiration_month'] = str_pad(
                    $requestData['expiration_month'], 2, "0", $padType = STR_PAD_LEFT
                );
            }
            $reservation = $this->reservation->process(
                Auth::user(),
                $cart,
                $requestData
            );
            if ($reservation instanceof Reservation) {
                event(new SuccessfulReservation($reservation));
                return redirect()->route('reservation-success');
            } else {
                $this->prefillCustomerInfo();
                return view('pages.reservations.index', [
                    'cart' => session('escape_cart'),
                    'payment_status' => $reservation
                ]);
            }
        } else {
            //user supplied incorrect email/password combo
            return view('pages.reservations.index', [
                'cart' => session('escape_cart'),
                'auth_error' => 'Email/password combination was incorrect.'
            ]);
        }
    }

    public function showSuccess(Request $request)
    {
        $cart = session('escape_cart');
        if (Auth::check()) {
            return view('pages.reservations.success', compact('cart'));
        } else {
            return $request->redirect()->route('reservations');
        }

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
    public function update(Request $request, $id)
    {
        //
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

    private function shouldRequireGender($cart)
    {
        return $cart->room === 'shared'
                && $cart->guests == 1 ? 'required' : '';
    }
}
