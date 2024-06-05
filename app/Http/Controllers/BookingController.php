<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create(Schedule $schedule)
    {
        // Get all booked seats for this schedule
        $bookedSeats = Ticket::where('schedule_id', $schedule->id)->pluck('seat')->toArray();

        // Assuming bus seat capacity is a fixed value, for example, 50 seats
        $totalSeats = $schedule->bus->seat_capacity;
        $availableSeats = range(1, $totalSeats);
        
        // Remove booked seats from available seats
        $availableSeats = array_diff($availableSeats, $bookedSeats);

        return view('user.booking.create', compact('schedule', 'availableSeats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'alamat' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'seat' => 'required|integer|min:1',
        ]);

        $schedule = Schedule::findOrFail($request->schedule_id);
        $totalPrice = $schedule->price * $request->seat;

        Ticket::create([
            'user_id' => Auth::id(),
            'schedule_id' => $request->schedule_id,
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'seat' => $request->seat,
            'total_price' => $totalPrice,
        ]);

        $schedule->decrement('seat_capacity', $request->seat);

        return redirect()->route('tickets.index')->with(' Tiket berhasil dipesan !');
    }

    public function destroy(Ticket $ticket)
    {
        if ($ticket->user_id != Auth::id()) {
            return redirect()->route('tickets.index')->with('error', 'Anda tidak memiliki izin untuk menghapus tiket ini.');
        }

        $schedule = $ticket->schedule;

        if ($schedule) {
            $schedule->increment('seat_capacity', $ticket->seat);
        }

        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
