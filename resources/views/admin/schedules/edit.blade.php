@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #2F5241; color: #fff;">
                    <h2 class="mb-0">Edit Jadwal</h2>
                </div>
                <div class="card-body" style="background-color: #E4E5DB;">
                    <form action="{{ route('schedules.update', $schedule->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="bus_id" class="form-label" style="color: #1542A3;">Pilih Bus</label>
                            <select name="bus_id" id="bus_id" class="form-select" required style="border-bottom: 2px solid #C4C4C4;">
                                <option value="">Pilih Bus</option>
                                @foreach($buses as $bus)
                                    <option value="{{ $bus->id }}" {{ $schedule->bus_id == $bus->id ? 'selected' : '' }}>{{ $bus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="from_city" class="form-label" style="color: #1542A3;">Dari Kota</label>
                            <select name="from_city" id="from_city" class="form-select" required style="border-bottom: 2px solid #C4C4C4;">
                                <option value="">Pilih Kota</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ $schedule->from_city == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="to_city" class="form-label" style="color: #1542A3;">Ke Kota</label>
                            <select name="to_city" id="to_city" class="form-select" required style="border-bottom: 2px solid #C4C4C4;">
                                <option value="">Pilih Kota</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ $schedule->to_city == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="departure_date" class="form-label" style="color: #1542A3;">Tanggal Keberangkatan</label>
                            <input type="date" name="departure_date" id="departure_date" class="form-control" value="{{ $schedule->departure_date }}" required style="border-bottom: 2px solid #C4C4C4;">
                        </div>

                        <div class="mb-3">
                            <label for="departure_time" class="form-label" style="color: #1542A3;">Waktu Keberangkatan</label>
                            <input type="time" name="departure_time" id="departure_time" class="form-control" required style="border-bottom: 2px solid #C4C4C4;">
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label" style="color: #1542A3;">Harga</label>
                            <input type="number" name="price" id="price" class="form-control" value="{{ $schedule->price }}" required style="border-bottom: 2px solid #C4C4C4;">
                        </div>

                        <button type="submit" class="btn btn-primary" style="background-color: #1542A3;">Update Jadwal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
