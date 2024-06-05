@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center"><i class="bi bi-person-circle"></i> Isi Data Penumpang</h2>
    <div class="card mb-4 col-md-8 mx-auto" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #E4E5DB;">
        <div class="card-body" style="padding: 20px;">
            <form action="{{ route('booking.store') }}" method="POST">
                @csrf
                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}">

                <div class="form-group mb-3">
                    <label for="name" class="form-label"><i class="bi bi-person"></i> Nama</label>
                    <input type="text" name="name" id="name" class="form-control" required style="background-color: #F9FAF5;">
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email</label>
                    <input type="email" name="email" id="email" class="form-control" required style="background-color: #F9FAF5;">
                </div>

                <div class="form-group mb-3">
                    <label for="alamat" class="form-label"><i class="bi bi-geo-alt"></i> Alamat Lengkap</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" required style="background-color: #F9FAF5;">
                </div>

                <div class="form-group mb-3">
                    <label for="phone" class="form-label"><i class="bi bi-telephone"></i> Nomor Telepon</label>
                    <input type="text" name="phone" id="phone" class="form-control" required style="background-color: #F9FAF5;">
                </div>

                <div class="form-group mb-4">
                    <label for="seat" class="form-label"><i class="bi bi-chair"></i> Jumlah Kursi</label>
                    <input type="number" name="seat" id="seat" class="form-control" required min="1" style="background-color: #F9FAF5;">
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary" style="background-color: #1542A3; border-color: #1542A3;">Pesan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection