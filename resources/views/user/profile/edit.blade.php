@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Profil</h2>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" class="form-control" value="{{ $user->email }}" readonly>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ $user->alamat }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
