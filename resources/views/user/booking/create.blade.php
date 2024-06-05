@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Isi Data Penumpang</h2>
    <form action="{{ route('booking.store') }}" method="POST">
        @csrf
        <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat Lengkap</label>
            <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Nomor Telepon</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="seat">Jumlah Kursi</label>
            <input type="number" name="seat" id="seat" class="form-control" required min="1">
        </div>
        
        <button type="submit" class="btn btn-primary">Pesan</button>
    </form>
</div>
@endsection
