<?php

namespace App\Http\Controllers\Backend\Payments\FreeKassa;

use App\Http\Controllers\Backend\Payments\PaymentsController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Redirect;
use Maksa988\FreeKassa\Facades\FreeKassa;

class FreeKassaPaymentController extends Controller
{
    public function initPayment()
    {
        $amount = session('amount');
        $redirect = FreeKassa::getPayUrl($amount, 123);
        // dd($redirect);
        return Redirect::to($redirect);
    }

    public function handlePayment(Request $request)
    {
        return FreeKassa::handle($request);
    }
}
