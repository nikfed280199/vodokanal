<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reading;
use App\Models\Meter;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $readings = Reading::with('meter')->orderBy('date', 'desc')->get();

        return view('readings.index', compact('readings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $meters = Meter::all();

        return view('readings.create', compact('meters'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'meter_id' => 'required|exists:meters,id',
            'value' => 'required|numeric|min:0',
        ]);

        Reading::create([
            'meter_id' => $request->meter_id,
            'value' => $request->value,
            'date' => now(),
        ]);

        return redirect()->route('readings.index')
            ->with('success', 'Показания успешно добавлены.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reading $reading)
    {
        return view('readings.show', compact('reading'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reading $reading)
    {
        $meters = Meter::all();

        return view('readings.edit', compact('reading', 'meters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reading $reading)
    {
        $request->validate([
            'meter_id' => 'required|exists:meters,id',
            'value' => 'required|numeric|min:0',
        ]);

        $reading->update([
            'meter_id' => $request->meter_id,
            'value' => $request->value,
            'date' => $request->date ?? now(),
        ]);

        return redirect()->route('readings.index')
            ->with('success', 'Показания успешно обновлены.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reading $reading)
    {
        $reading->delete();

        return redirect()->route('readings.index')
            ->with('success', 'Показания успешно удалены.');
    }
}
