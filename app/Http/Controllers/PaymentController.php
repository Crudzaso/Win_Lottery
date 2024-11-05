<?php

namespace App\Http\Controllers;

use App\Services\NequiService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $nequiService;

    public function __construct(NequiService $nequiService)
    {
        $this->nequiService = $nequiService;
    }

    public function makePayment(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'reference' => 'required|string',
        ]);

        try {
            $response = $this->nequiService->createPayment($validated['amount'], $validated['reference']);
            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

