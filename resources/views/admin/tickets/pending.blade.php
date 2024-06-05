@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Daftar Tiket Pending</h2>
    @if($tickets->isEmpty())
        <div class="alert alert-warning text-center">Tidak ada tiket pending untuk ditampilkan.</div>
    @else
        <style>
            /* Ganti warna header sesuai keinginan Anda */
            .custom-header th {
                background-color: #2F5241; /* Ganti warna latar belakang */
                color: #fff; /* Ganti warna teks */
            }
            /* Tambahkan margin pada kolom untuk lebih banyak ruang */
            .table th, .table td {
                padding: 0.75rem;
                vertical-align: middle;
            }
            /* Atur lebar kolom aksi */
            .table th.aksi, .table td.aksi {
                width: 150px;
            }
            /* Set button group to be inline flex */
            .btn-group {
                display: flex;
                justify-content: center;
                gap: 5px;
            }
        </style>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="custom-header text-center">
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
                        <th class="aksi">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-center">
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
                            <td class="aksi">
                                <div class="btn-group">
                                    <form action="{{ route('admin.tickets.verify', $ticket->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm">Verifikasi</button>
                                    </form>
                                    <form action="{{ route('admin.tickets.reject', $ticket->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menolak tiket ini?')">Tolak</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
