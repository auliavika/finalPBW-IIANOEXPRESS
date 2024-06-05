@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Jadwal</h2>
    <a href="{{ route('schedules.create') }}" class="btn btn-success mb-3" style="background-color: #1542A3;">Tambah Jadwal</a>
    <style>
        /* Ganti warna header sesuai keinginan Anda */
        .custom-header th {
            background-color: #2F5241; /* Ganti warna latar belakang */
            color: #fff; /* Ganti warna teks */
        }
    </style>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="custom-header">
                <tr>
                    <th>No</th>
                    <th>Bus</th>
                    <th>Dari Kota</th>
                    <th>Ke Kota</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Waktu Keberangkatan</th>
                    <th>Kapasitas</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->id }}</td>
                        <td>{{ $schedule->bus->name }}</td>
                        <td>{{ $schedule->fromCity->name }}</td>
                        <td>{{ $schedule->toCity->name }}</td>
                        <td>{{ $schedule->departure_date }}</td>
                        <td>{{ $schedule->departure_time }}</td>
                        <td>{{ $schedule->seat_capacity }}</td>
                        <td>Rp {{ number_format($schedule->price, 2) }}</td>
                        <td>
                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
