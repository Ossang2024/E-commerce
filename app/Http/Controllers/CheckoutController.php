<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function processCheckout(Request $request)
    {
        session(['checkout_total' => $request->total]);

        $method = $request->payment_method;

        if ($method === 'cash') {
            return redirect()->route('payment.cash');
        }

        if ($method === 'cashapp') {
            return redirect()->route('payment.cashapp');
        }

        if ($method === 'crypto') {
            return redirect()->route('payment.crypto');
        }

        return back()->with('error', 'Méthode de paiement invalide.');
    }

    public function confirm()
    {
        $total = session('checkout_total');

        // plus tard : création de commande, enregistrement, etc.

        return view('order.confirm', compact('total'));
    }
}