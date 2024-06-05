<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index()
    {
        $buses = Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    public function create()
    {
        return view('admin.buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'seat_count' => 'required|integer|min:1',
        ]);

        Bus::create([
            'name' => $request->name,
            'seat_count' => $request->seat_count,
        ]);

        return redirect()->route('admin.buses.index')->with('success', 'Bus berhasil ditambahkan.');
    }

    public function edit(Bus $bus)
    {
        return view('admin.buses.edit', compact('bus'));
    }

    public function update(Request $request, Bus $bus)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'seat_count' => 'required|integer|min:1',
        ]);

        $bus->update([
            'name' => $request->name,
            'seat_count' => $request->seat_count,
        ]);

        return redirect()->route('admin.buses.index')->with('success', 'Bus berhasil diupdate.');
    }

    public function destroy(Bus $bus)
    {
        $bus->delete();
        return redirect()->route('admin.buses.index')->with('success', 'Bus berhasil dihapus.');
    }
}
