@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="background-color: #2F5241; color: #fff;">
                    <h2 class="mb-0">Tambah Jadwal</h2>
                </div>
                <div class="card-body" style="background-color: #E4E5DB;">
                    <form action="{{ route('schedules.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="bus_id" style="color: #1542A3;">Pilih Bus</label>
                            <select name="bus_id" id="bus_id" class="form-control" required style="border-bottom: 2px solid #C4C4C4;">
                                <option value="">Pilih Bus</option>
                                @foreach($buses as $bus)
                                    <option value="{{ $bus->id }}">{{ $bus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="from_city" style="color: #1542A3;">Dari Kota</label>
                            <select name="from_city" id="from_city" class="form-control" required style="border-bottom: 2px solid #C4C4C4;">
                                <option value="">Pilih Kota</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="to_city" style="color: #1542A3;">Ke Kota</label>
                            <select name="to_city" id="to_city" class="form-control" required style="border-bottom: 2px solid #C4C4C4;">
                                <option value="">Pilih Kota</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="departure_date" style="color: #1542A3;">Tanggal Keberangkatan</label>
                            <input type="date" name="departure_date" id="departure_date" class="form-control" required style="border-bottom: 2px solid #C4C4C4;">
                        </div>

                        <div class="form-group mb-3">
                            <label for="departure_time" style="color: #1542A3;">Waktu Keberangkatan</label>
                            <input type="time" name="departure_time" id="departure_time" class="form-control" required style="border-bottom: 2px solid #C4C4C4;">
                        </div>

                        <div class="form-group mb-3">
                            <label for="price" style="color: #1542A3;">Harga</label>
                            <input type="number" name="price" id="price" class="form-control" required style="border-bottom: 2px solid #C4C4C4;">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100" style="background-color: #1542A3;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
