@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Tambah Jadwal</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('schedules.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="bus_id">Pilih Bus</label>
                    <select name="bus_id" id="bus_id" class="form-control" required>
                <option value="">Pilih Bus</option>
                @foreach($buses as $bus)
                    <option value="{{ $bus->id }}">{{ $bus->name }}</option>
                @endforeach
            </select>
                </div>
                
                <div class="form-group mb-3">
                    <label for="from_city">Dari Kota</label>
                    <select name="from_city" id="from_city" class="form-control" required>
                        <option value="">Pilih Kota</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="to_city">Ke Kota</label>
                    <select name="to_city" id="to_city" class="form-control" required>
                        <option value="">Pilih Kota</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="departure_date">Tanggal Keberangkatan</label>
                    <input type="date" name="departure_date" id="departure_date" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="departure_time">Waktu Keberangkatan</label>
                    <input type="time" name="departure_time" id="departure_time" class="form-control" required>
                </div>

            

                 <div class="form-group">
                    <label for="price">Harga</label>
                     <input type="number" name="price" id="price" class="form-control" required>
                 </div>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
