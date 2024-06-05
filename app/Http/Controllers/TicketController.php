<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())
        ->where('status', 'Pending ..')
        ->get();

    return view('user.tickets.index', compact('tickets'));
    }


    public function destroy(Ticket $ticket)
    {
        // Pastikan tiket dimiliki oleh pengguna yang saat ini masuk
        if ($ticket->user_id != Auth::id()) {
            return redirect()->route('tickets.index')->with('error', 'Anda tidak memiliki izin untuk menghapus tiket ini.');
        }

        // Dapatkan jadwal terkait dengan tiket
        $schedule = $ticket->schedule;

        // Pastikan jadwal ditemukan
        if (!$schedule) {
            return redirect()->route('tickets.index')->with('error', 'Jadwal tidak ditemukan untuk tiket ini.');
        }

        // Tambahkan jumlah kursi dari tiket yang akan dihapus kembali ke seat_capacity
        $schedule->increment('seat_capacity', $ticket->seat);

        // Hapus tiket
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dihapus.');
    }
    public function verify(Ticket $ticket)
    {
        $ticket->update(['status' => 'Sudah Bayar']);
        return redirect()->route('admin.tickets.pending')->with('success', 'Tiket berhasil diverifikasi.');
    }

    // Method for rejecting a ticket
    public function reject(Ticket $ticket)
    {
        $ticket->update(['status' => 'Rejected']);

        $schedule = $ticket->schedule;
        $schedule->increment('seat_capacity', $ticket->seat);
        
        return redirect()->route('admin.tickets.pending')->with('success', 'Tiket berhasil ditolak.');
    }

    public function pendingTickets()
    {
        $tickets = Ticket::where('status', 'Pending ..')->get();
        return view('admin.tickets.pending', compact('tickets'));
    }

    public function history()
{
    $tickets = Ticket::where('user_id', Auth::id())
        ->where('status', 'Sudah Bayar')
        ->get();

    return view('user.tickets.history', compact('tickets'));
}
}

