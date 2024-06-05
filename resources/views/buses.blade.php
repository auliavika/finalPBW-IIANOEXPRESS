@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Bus</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <!-- Tambahkan kolom lain jika diperlukan -->
                </tr>
            </thead>
            <tbody>
                @foreach($buses as $bus)
                    <tr>
                        <td>{{ $bus->id }}</td>
                        <td>{{ $bus->name }}</td>
                        <!-- Tambahkan kolom lain jika diperlukan -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection