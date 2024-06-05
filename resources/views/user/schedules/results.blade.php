@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Hasil Pencarian Jadwal</h2>
    @if($schedules->isEmpty())
        <div class="alert alert-warning">Tidak ada jadwal yang ditemukan untuk rute dan tanggal yang dipilih.</div>
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
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->bus->name }}</td>
                        <td>{{ $schedule->fromCity->name }}</td>
                        <td>{{ $schedule->toCity->name }}</td>
                        <td>{{ $schedule->departure_date }}</td>
                        <td>{{ $schedule->departure_time }}</td>
                        <td>{{ $schedule->seat_capacity }}</td>
                        <td>{{ $schedule->price }}</td>
                        <td>    
                            <a href="{{ route('booking.create', $schedule) }}" class="btn btn-primary">Pesan</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
