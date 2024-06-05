@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Profil Saya</h2>
    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" id="name" class="form-control" value="{{ $user->name }}" readonly>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" id="email" class="form-control" value="{{ $user->email }}" readonly>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" class="form-control" value="{{ $user->alamat }}" readonly>
    </div>

    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profil</a>
</div>
@endsection
