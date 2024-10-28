<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Reading;
use App\Models\Payment;

class ExportController extends Controller
{
    public function exportReadingsToPDF()
    {
        $userId = Auth::id();
        $readings = Reading::whereHas('meter', fn($query) => $query->where('user_id', $userId))->get();

        $pdf = Pdf::loadView('export.readings', compact('readings'));

        return $pdf->download('history_readings.pdf');
    }

    public function exportPaymentsToPDF()
    {
        $userId = Auth::id();
        $payments = Payment::where('user_id', $userId)->get();

        $pdf = Pdf::loadView('export.payments', compact('payments'));

        return $pdf->download('history_payments.pdf');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
