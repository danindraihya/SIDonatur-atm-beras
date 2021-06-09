@extends('layouts.base')

@section('title', 'Laporan')

@section('ext')
    <form action="{{ route('laporan.cetak') }}" method="POST">
        @csrf
        <input type="hidden" name="date" value=<?= $date; ?>>
        <input type="hidden" name="startDate" value=<?= $date->startOfWeek(); ?>>
        <input type="hidden" name="endDate" value=<?= $date->endOfWeek(); ?>>
        <button class="btn btn-dark">Cetak Laporan</button>
    </form>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Donasi Uang</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered border-primary mb-3">
                <tr>
                    <th width="25%">Periode</th>
                    <td>{{ $date->startOfWeek()->isoFormat('dddd, D MMM Y') }} s.d. {{ $date->endOfWeek()->isoFormat('dddd, D MMM Y') }}</td>
                </tr>
                <tr>
                    <th>Jumlah Donasi</th>
                    <td>{{ $donasiUang->count() }}</td>
                </tr>
                <tr>
                    <th>Total Donasi</th>
                    <td>@rupiah($donasiUang->sum('nominal'))</td>
                </tr>
            </table>
            <table id="donasi_uang_table" class="display">
                <thead>
                <tr>
                    <th width="10%">Tanggal</th>
                    <th width="20%">Jenis Donatur</th>
                    <th>Nama Donatur</th>
                    <th width="20%">Nominal</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($donasiUang as $data)
                    <tr>
                        <td>{{ $data->formatted_date }}</td>
                        <td>{{ $data->donatur->jenisDonatur->label }}</td>
                        <td>{{ $data->donatur->nama }}</td>
                        <td>@rupiah($data->nominal)</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <strong>Donasi Beras</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered border-primary mb-3">
                <tr>
                    <th width="25%">Periode</th>
                    <td>{{ $date->startOfWeek()->isoFormat('dddd, D MMM Y') }} s.d. {{ $date->endOfWeek()->isoFormat('dddd, D MMM Y') }}</td>
                </tr>
                <tr>
                    <th>Jumlah Donasi</th>
                    <td>{{ $donasiBeras->count() }}</td>
                </tr>
                <tr>
                    <th>Total Donasi</th>
                    <td>{{ $donasiBeras->sum('jumlah') }} kilogram</td>
                </tr>
            </table>
            <table id="donasi_beras_table" class="display">
                <thead>
                <tr>
                    <th width="10%">Tanggal</th>
                    <th width="20%">Jenis Donatur</th>
                    <th>Nama Donatur</th>
                    <th width="20%">Jumlah</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($donasiBeras as $data)
                    <tr>
                        <td>{{ $data->formatted_date }}</td>
                        <td>{{ $data->donatur->jenisDonatur->label }}</td>
                        <td>{{ $data->donatur->nama }}</td>
                        <td>{{ $data->jumlah }} kg</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#donasi_uang_table').DataTable();
            $('#donasi_beras_table').DataTable();
        });
    </script>
@endpush
