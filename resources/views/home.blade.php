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
                        {{ $jumlahDonatur }}
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
                        @rupiah($jumlahDonasiUang)
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
                        @number($jumlahDonasiBeras)
                        <small>Kilogram</small>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Donasi Uang 30 Hari Terakhir</div>
                <div class="card-body">
                    <canvas id="chart-donasi-uang"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Donasi Beras 30 Hari Terakhir</div>
                <div class="card-body">
                    <canvas id="chart-donasi-beras"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.1/chart.min.js" integrity="sha512-BqNYFBAzGfZDnIWSAEGZSD/QFKeVxms2dIBPfw11gZubWwKUjEgmFUtUls8vZ6xTRZN/jaXGHD/ZaxD9+fDo0A==" crossorigin="anonymous"></script>
    <script>
        const chartDonasiUang = document.getElementById('chart-donasi-uang');
        const chartDonasiBeras = document.getElementById('chart-donasi-beras');
        const labels = {!! $chartLabel !!};

        new Chart(chartDonasiUang, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Nominal',
                        data: {!! $chartDataDonasiUang !!},
                        fill: false
                    }
                ],
            }
        });

        new Chart(chartDonasiBeras, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Jumlah',
                        data: {!! $chartDataDonasiBeras !!},
                        fill: false
                    }
                ],
            }
        });
    </script>
@endpush
