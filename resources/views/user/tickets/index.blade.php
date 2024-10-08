@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center"><i class="bi bi-ticket"></i> Tiket Saya</h2>
    <p class="mb-4 text-center">Catatan: Pembayaran dilakukan secara langsung</p>
    @if($tickets->isEmpty())
       <div class="alert alert-warning text-center">
    Anda belum memesan tiket. 
    <br>
    <a href="{{ route('tickets.history') }}" class="link-primary mt-3">Lihat Riwayat Pemesanan</a>
</div>
    @else
        @foreach($tickets as $ticket)
        <div class="card mb-4 col-md-8 mx-auto" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #E4E5DB; position: relative;">
            <div class="card-body" style="padding-left: 15px;">
                <button type="button" class="btn btn-danger btn-sm" style="position: absolute; top: 10px; right: 10px;" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin membatalkan tiket ini?')) { document.getElementById('delete-ticket-{{ $ticket->id }}').submit(); }"><i class="bi bi-x"></i></button>
                <form id="delete-ticket-{{ $ticket->id }}" action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <div class="row">
                    <div class="col-md-6">
                        <h5 class="card-title mb-0">{{ $ticket->schedule->bus->name }}</h5>
                        <p class="card-text text-muted">Dari <i class="bi bi-geo-alt"></i> {{ $ticket->schedule->fromCity->name }} <i class="bi bi-arrow-right"></i> {{ $ticket->schedule->toCity->name }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <p class="mb-3"><i class="bi bi-calendar"></i> <strong>{{ $ticket->schedule->departure_date }}</strong></p>
                        <p class="mb-0"><i class="bi bi-clock"></i> <strong>{{ $ticket->schedule->departure_time }}</strong></p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-3"><i class="bi bi-person"></i> <strong>{{ $ticket->seat }}</strong></p>
                        <p class="mb-0"><i class="bi bi-telephone"></i> <strong>{{ $ticket->phone }}</strong></p>
                    </div>
                    <div class="col-md-4">
                        <p class="mb-3"><i class="bi bi-cash"></i> <strong>Rp {{ number_format($ticket->total_price, 2) }}</strong></p>
                        <p class="mb-0"><i class="bi bi-geo-alt"></i> <strong>{{ $ticket->alamat }}</strong></p>
                    </div>
                </div>
            </div>
            <div class="les-hijau"></div> <!-- Element untuk les hijau -->
        </div>
        @endforeach
    @endif
</div>

<style>
    .les-hijau {
        position: absolute;
        top: 0;
        left: -5px; /* Mengatur posisi kiri agar menutupi sampai ke sudut */
        width: 10px; /* Lebar les */
        height: 100%; /* Tinggi les mengikuti card */
        background-color: #2F5241; /* Warna les */
        border-top-left-radius: 10px; /* Mengatur sudut les */
        border-bottom-left-radius: 10px; /* Mengatur sudut les */
        z-index: -1; /* Meletakkan les di bawah card */
    }
</style>

@endsection
