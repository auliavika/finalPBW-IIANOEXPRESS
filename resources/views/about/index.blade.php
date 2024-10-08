@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg" style="background-color: #F9FAF5; border-radius: 20px;">
                <div class="card-body text-center">
                    <h1 class="mb-4" style="color: #2F5241; font-weight: bold;">Tentang Kami</h1>
                    <p class="lead mb-4" style="color: #5A9177;">Selamat datang di IIANO EXPRES!</p>
                    <p class="mb-4" style="font-size: 1.2rem;">
                        Kami adalah penyedia layanan pemesanan tiket HIACE untuk wilayah Aceh, berkomitmen untuk memberikan pengalaman perjalanan yang nyaman dan menyenangkan. 
                    </p>
                    <p style="font-size: 1.2rem;">
                        Dengan berbagai pilihan armada dan layanan pelanggan yang responsif, kami siap membantu Anda merencanakan perjalanan Anda dengan baik.
                    </p>
                    <p class="mb-4" style="font-size: 1.2rem;">Silahkan kunjungi kami untuk informasi lebih lanjut.</p>
                    <a href="{{ route('home') }}" class="btn btn-primary">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
