@extends('layouts.base')

@section('title', 'Dasbor')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <i class="fas fa-users"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Donatur</span>
                <span class="info-box-number">
                    10
                    <small>Orang</small>
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1">
                <i class="fas fa-wallet"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Donasi Uang Terkumpul</span>
                <span class="info-box-number">
                    @rupiah(150000000000)
                </span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1">
                <i class="fas fa-utensils"></i>
            </span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Donasi Beras Terkumpul</span>
                <span class="info-box-number">
                    @number(250)
                    <small>Kilogram</small>
                </span>
            </div>
        </div>
    </div>
</div>
@endsection