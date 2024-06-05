@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Tiket Pending</h2>
    @if($tickets->isEmpty())
        <div class="alert alert-warning">Tidak ada tiket pending untuk ditampilkan.</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Bus</th>
                    <th>Dari Kota</th>
                    <th>Ke Kota</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Waktu Keberangkatan</th>
                    <th>Pemesan</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>No. Hp</th>
                    <th>Kursi</th>
                    <th>Aksi</th>
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
                        <td>{{ $ticket->name }}</td>
                        <td>{{ $ticket->email }}</td>
                        <td>{{ $ticket->alamat }}</td>
                        <td>{{ $ticket->phone }}</td>
                        <td>{{ $ticket->seat }}</td>
                        <td>
                            <form action="{{ route('admin.tickets.verify', $ticket->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success">Verifikasi</button>
                            </form>
                            <form action="{{ route('admin.tickets.reject', $ticket->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menolak tiket ini?')">Tolak</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection