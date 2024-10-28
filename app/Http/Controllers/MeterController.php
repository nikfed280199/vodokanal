<?php

namespace App\Http\Controllers;

use App\Models\Meter;
use Illuminate\Http\Request;

class MeterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $meters = auth()->user()->meters;
        return view('meters.index', compact('meters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('meters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|in:hot,cold',
            'number' => 'required|string|unique:meters,number',
            'address' => 'required|string',
        ]);

        auth()->user()->meters()->create($request->only('type', 'number', 'address'));

        return redirect()->route('meters.index')->with('success', 'Счетчик добавлен успешно');
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
