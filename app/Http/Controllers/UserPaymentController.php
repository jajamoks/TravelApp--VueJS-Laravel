<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Reservation;
use App\Payment;
use App\Events\SuccessfulPayment;

class UserPaymentController extends Controller
{
    public function process(Request $request, $id)
    {
        $this->validate($request, [
            'credit_card_number' => 'required|digits_between:13,19',
            'expiration_month' => 'required|digits_between:1,2',
            'expiration_year' => 'required|digits:4',
            'cvv_code' => 'required:digits_between:3,4'
        ]);
        $user = Auth::user();
        $reservation = Reservation::findOrFail($id);
        $requestData = $request->all();
         //pad month if only one digit supplied
         if(strlen($requestData['expiration_month']) == 1) {
            $requestData['expiration_month'] = str_pad(
                $requestData['expiration_month'], 2, "0", $padType = STR_PAD_LEFT
            );
        }
        $payment = $reservation->processBalance($user, $requestData);
        if ($payment instanceof Payment) {
            event(new SuccessfulPayment($payment));
            return $reservation->fresh()->payments;
        } else {
            return response()->json($payment, 400);
        }

    }
}
