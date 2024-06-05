@extends('layouts.app')
 
@section('content')
<div class="container mt-5">
    <div class="card bg-light">
        <div class="card-header d-flex align-items-center" style="background-color: #2F5241; color: #E4E5DB;">
            <h2>Total Pendapatan</h2>
        </div>
        <div class="card-body">
            <h4 class="text-dark">Total Pendapatan: Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}</h4>
        </div>
    </div>
</div>
@endsection
