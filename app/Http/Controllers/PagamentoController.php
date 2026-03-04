<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function checkout(Request $request, $price_id)
    {
        $user = $request->user();
        return $user->newSubscription('default', $price_id)->checkout(
            [
                'success_url' => route('login'),
            ]);
    }
}
