@extends('layouts.app')
 
@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Total Pendapatan</h2>
        </div>
        <div class="card-body">
            <h4>Total Pendapatan : Rp. {{ number_format($totalPendapatan, 0, ',', '.') }}</h4>
        </div>
    </div>
</div>
@endsection