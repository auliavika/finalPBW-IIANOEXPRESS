@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Riwayat Pemesanan</h2>
    @if($tickets->isEmpty())
        <div class="alert alert-warning">Anda belum memiliki riwayat pemesanan.</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Bus</th>
                    <th>Dari Kota</th>
                    <th>Ke Kota</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Waktu Keberangkatan</th>
                    <th>Jumlah Kursi</th>
                    <th>No. Hp</th>
                    <th>Harga</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->schedule->bus->name }}</td>
                        <td>{{ $ticket->schedule->fromCity->name }}</td>
                        <td>{{ $ticket->schedule->toCity->name }}</td>
                        <td>{{ $ticket->schedule->departure_date }}</td>
                        <td>{{ $ticket->schedule->departure_time }}</td>
                        <td>{{ $ticket->seat }}</td>
                        <td>{{ $ticket->phone }}</td>
                        <td>Rp {{ number_format($ticket->total_price, 2) }}</td>
                        <td>{{ $ticket->alamat }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
