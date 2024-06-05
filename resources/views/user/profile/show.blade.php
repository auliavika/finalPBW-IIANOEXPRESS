@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center"><i class="bi bi-person-circle"></i> Profil Saya</h2>
    <div class="card mb-4 col-md-8 mx-auto" style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); background-color: #E4E5DB;">
        <div class="card-body" style="padding: 20px;">
            <div class="form-group mb-3">
                <label for="name" class="form-label"><i class="bi bi-person"></i> Nama</label>
                <input type="text" id="name" class="form-control" value="{{ $user->name }}" readonly style="background-color: #F9FAF5;">
            </div>

            <div class="form-group mb-3">
                <label for="email" class="form-label"><i class="bi bi-envelope"></i> Email</label>
                <input type="text" id="email" class="form-control" value="{{ $user->email }}" readonly style="background-color: #F9FAF5;">
            </div>

            <div class="form-group mb-4">
                <label for="alamat" class="form-label"><i class="bi bi-geo-alt"></i> Alamat</label>
                <input type="text" id="alamat" class="form-control" value="{{ $user->alamat }}" readonly style="background-color: #F9FAF5;">
            </div>

            <a href="{{ route('profile.edit') }}" class="btn btn-primary" style="background-color: #1542A3; border-color: #1542A3;">Edit Profil</a>
        </div>
    </div>
</div>
@endsection
