@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center"><i class="bi bi-bus"></i> Edit Bus</h2>
    <div class="card mb-4 col-md-8 mx-auto" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #E4E5DB;">
        <div class="card-body" style="padding: 20px;">
            <form action="{{ route('buses.update', $bus->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name" class="form-label"><i class="bi bi-tag"></i> Nama Bus</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $bus->name }}" required style="background-color: #F9FAF5;">
                </div>

                <div class="form-group mb-3">
                    <label for="seat_count" class="form-label"><i class="bi bi-chair"></i> Jumlah Kursi</label>
                    <input type="number" name="seat_count" id="seat_count" class="form-control" value="{{ $bus->seat_count }}" required min="1" style="background-color: #F9FAF5;">
                </div>

                <button type="submit" class="btn btn-primary w-100" style="background-color: #1542A3; border-color: #1542A3;">Update Bus</button>
            </form>
        </div>
    </div>
</div>
@endsection