<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Bus;
use App\Models\City;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create()
    {
        $buses = Bus::all();
        $cities = City::all();
        return view('admin.schedules.create', compact('buses', 'cities'));
    }

    public function edit(Schedule $schedule)
    {
        $buses = Bus::all();
        $cities = City::all();
        return view('admin.schedules.edit', compact('schedule', 'buses', 'cities'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'from_city' => 'required|exists:cities,id',
            'to_city' => 'required|exists:cities,id',
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'price' => 'required|numeric|min:0',
        ]);
    
        $schedule->update($request->all());
        return redirect()->route('admin.schedules.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bus_id' => 'required|exists:buses,id',
            'from_city' => 'required|exists:cities,id',
            'to_city' => 'required|exists:cities,id',
            'departure_date' => 'required|date',
            'departure_time' => 'required|date_format:H:i',
            'price' => 'required|numeric|min:0',
        ]);

        $bus = Bus::find($request->bus_id);

        if (!$bus) {
            return redirect()->back()->with('error', 'Bus not found.');
        }

        Schedule::create([
            'bus_id' => $bus->id,
            'from_city' => $request->from_city,
            'to_city' => $request->to_city,
            'departure_date' => $request->departure_date,
            'departure_time' => $request->departure_time,
            'price' => $request->price,
            'seat_capacity' => $bus->seat_count,
        ]);

        return redirect()->route('admin.schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function showSearchForm()
    {
        $cities = City::all();
        return view('user.schedules.search', compact('cities'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'from_city' => 'required|exists:cities,id',
            'to_city' => 'required|exists:cities,id',
            'departure_date' => 'required|date',
        ]);

        $schedules = Schedule::where('from_city', $request->from_city)
            ->where('to_city', $request->to_city)
            ->where('departure_date', $request->departure_date)
            ->where('seat_capacity', '>=', $request->seat)
            ->with(['bus', 'fromCity', 'toCity'])
            ->get();

        return view('user.schedules.results', compact('schedules'));
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
