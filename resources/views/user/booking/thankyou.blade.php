@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="background-color: #F9FAF5; border-radius: 20px;">
                <div class="card-body text-center">
                    <i class="bi bi-check-circle-fill display-1 text-success mb-4"></i>
                    <h1 class="mb-4" style="color: #2F5241; font-weight: bold;">TERIMA KASIH</h1>
                    <p class="lead mb-4" style="color: #5A9177;">Tiket Telah Dipesan</p>
                    <p class="mb-4" style="font-size: 1.2rem;">Silahkan cek di menu <a href="{{ route('tickets.index') }}" class="text-decoration-underline" style="color: #1542A3;">Tiket Saya</a></p>
                    <p><a href="{{ route('home') }}" class="btn btn-primary btn-lg" style="background-color: #1542A3; border-color: #1542A3;">Kembali Ke Beranda</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection