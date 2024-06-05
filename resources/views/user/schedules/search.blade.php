@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Cari Rute</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('schedules.search') }}" method="POST">
                @csrf
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

                <div class="form-group">
                    <label for="seat">Jumlah Kursi</label>
                    <input type="number" name="seat" id="seat" class="form-control" required min="1">
                </div>

                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </form>
        </div>
    </div>
</div>
@endsection