<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meter;
use App\Models\Reading;
use App\Models\Payment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMeters = Meter::count();
        $totalReadings = Reading::count();
        $totalPayments = Payment::count();

        $totalPaymentAmount = Payment::sum('amount');

        $coldWaterData = Reading::selectRaw('SUM(value) as consumption, DATE_TRUNC(\'month\', date) as month')
            ->where('date', '>=', Carbon::now()->subMonths(6))
            ->whereHas('meter', fn($query) => $query->where('type', 'cold'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $hotWaterData = Reading::selectRaw('SUM(value) as consumption, DATE_TRUNC(\'month\', date) as month')
            ->where('date', '>=', Carbon::now()->subMonths(6))
            ->whereHas('meter', fn($query) => $query->where('type', 'hot'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = $coldWaterData->pluck('month')->map(fn($date) => Carbon::parse($date)->format('F Y'))->toArray();
        $coldValues = $coldWaterData->pluck('consumption')->toArray();
        $hotValues = $hotWaterData->pluck('consumption')->toArray();

        return view('dashboard.index', compact('totalMeters', 'totalReadings', 'totalPayments', 'totalPaymentAmount', 'labels', 'coldValues', 'hotValues'));
    }
}
