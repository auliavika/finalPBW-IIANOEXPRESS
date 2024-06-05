

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Bus</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('buses.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="name">Nama Bus</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                
                <div class="form-group mb-3">
                    <label for="seat_count">Jumlah Kursi</label>
                    <input type="number" name="seat_count" id="seat_count" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
