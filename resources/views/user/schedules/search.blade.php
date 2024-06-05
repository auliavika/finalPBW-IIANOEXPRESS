@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card shadow mx-auto" style="max-width: 600px; border-radius: 15px; overflow: hidden;">
        <div class="card-header text-center" style="background-image: linear-gradient(to right, #2F5241, #5A9177); color: #E4E5DB; padding: 1.5rem;">
            <h2 class="mb-0" style="font-weight: bold;">Cari Rute</h2>
        </div>
        <div class="card-body" style="background-color: #F9FAF5; padding: 2rem;">
            <form action="{{ route('schedules.search') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                    <label for="from_city" class="form-label" style="color: #2F5241; font-weight: bold;">
                        <i class="bi bi-building me-2"></i> Dari Kota
                    </label>
                    <select name="from_city" id="from_city" class="form-control" required style="background-color: #E4E5DB; border-color: #C4C4C4;">
                        <option value="" disabled selected>Pilih Kota</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="to_city" class="form-label" style="color: #2F5241; font-weight: bold;">
                        <i class="bi bi-geo-alt me-2"></i> Ke Kota
                    </label>
                    <select name="to_city" id="to_city" class="form-control" required style="background-color: #E4E5DB; border-color: #C4C4C4;">
                        <option value="" disabled selected>Pilih Kota</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="departure_date" class="form-label" style="color: #2F5241; font-weight: bold;">
                        <i class="bi bi-calendar-date me-2"></i> Tanggal Keberangkatan
                    </label>
                    <input type="date" name="departure_date" id="departure_date" class="form-control" required style="background-color: #E4E5DB; border-color: #C4C4C4;">
                </div>
                <div class="form-group mb-4">
                    <label for="seat" class="form-label" style="color: #2F5241; font-weight: bold;">
                        <i class="bi bi-person me-2"></i> Jumlah Kursi
                    </label>
                    <input type="number" name="seat" id="seat" class="form-control" required min="1" style="background-color: #E4E5DB; border-color: #C4C4C4;">
                </div>
                <button type="submit" class="btn btn-primary w-100" style="background-color: #1542A3; border-color: #1542A3;">
                    <i class="bi bi-search me-2"></i> Cari
                </button>
            </form>
        </div>
    </div>
</div>
@endsection