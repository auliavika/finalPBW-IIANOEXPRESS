@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Jadwal</h2>
    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
                    <label for="bus_id">Pilih Bus</label>
                    <select name="bus_id" id="bus_id" class="form-control" required>
                <option value="">Pilih Bus</option>
                @foreach($buses as $bus)
                <option value="{{ $bus->id }}" {{ $schedule->bus_id == $bus->id ? 'selected' : '' }}>{{ $bus->name }}</option>
                @endforeach
            </select>
                </div>
                
                <div class="form-group mb-3">
                    <label for="from_city">Dari Kota</label>
                    <select name="from_city" id="from_city" class="form-control" required>
                        <option value="">Pilih Kota</option>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $schedule->from_city == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="to_city">Ke Kota</label>
                    <select name="to_city" id="to_city" class="form-control" required>
                        <option value="">Pilih Kota</option>
                        @foreach($cities as $city)
                        <option value="{{ $city->id }}" {{ $schedule->to_city == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="departure_date">Tanggal Keberangkatan</label>
                    <input type="date" name="departure_date" id="departure_date" class="form-control" value="{{ $schedule->departure_date }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="departure_time">Waktu Keberangkatan</label>
                    <input type="time" name="departure_time" id="departure_time" class="form-control" required>
                </div>

            

                 <div class="form-group">
                    <label for="price">Harga</label>
                     <input type="number" name="price" id="price" class="form-control" value="{{ $schedule->price}}" required>
                 </div>
        <button type="submit" class="btn btn-primary">Update Jadwal</button>
    </form>
</div>
@endsection
