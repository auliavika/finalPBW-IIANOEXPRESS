@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Bus</h2>
    <form action="{{ route('buses.update', $bus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="name">Nama Bus</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $bus->name }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="seat_count">Jumlah Kursi</label>
            <input type="number" name="seat_count" id="seat_count" class="form-control" value="{{ $bus->seat_count }}" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Update Bus</button>
    </form>
</div>
@endsection
