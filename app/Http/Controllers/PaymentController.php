<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;
use App\Models\Reading;

class PaymentController extends Controller
{
    protected $tariffs = [
        'cold' => 84.53,
        'hot' => 200.00,
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Payment::with('user')->get()->map(function ($payment) {
            $currentReadings = Reading::where('user_id', $payment->user_id)
                ->whereDate('date', '>=', now()->subMonth())
                ->get();

            Log::info('Current readings for user: ' . $payment->user_id, ['readings' => $currentReadings]);

            $totalAmount = $currentReadings->sum(function ($reading) {
                $tariff = $this->tariffs[$reading->meter->type];
                return $tariff * $reading->value;
            });

            $payment->amount = $totalAmount;
            return $payment;
        });

        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
