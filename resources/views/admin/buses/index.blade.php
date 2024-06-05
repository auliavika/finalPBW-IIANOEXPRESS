@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Bus</h2>
    <a href="{{ route('buses.create') }}" class="btn btn-primary mb-3">Tambah Bus</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah Kursi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($buses as $bus)
            <tr>
                <td>{{ $bus->name }}</td>
                <td>{{ $bus->seat_count }}</td>
                <td>
                    <a href="{{ route('buses.edit', $bus->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('buses.destroy', $bus->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus bus ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
