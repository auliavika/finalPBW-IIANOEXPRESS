@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Daftar Bus</h2>
    <a href="{{ route('buses.create') }}" class="btn btn-primary mb-3" style="background-color: #1542A3;">Tambah Bus</a>
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
                <tr style="background-color: #2F5241; color: #fff; text-align: center;">
                    <th>Nama</th>
                    <th>Jumlah Kursi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($buses as $bus)
                <tr>
                    <td>{{ $bus->name }}</td>
                    <td style="text-align: center;">{{ $bus->seat_count }}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('buses.edit', $bus->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('buses.destroy', $bus->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus bus ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection