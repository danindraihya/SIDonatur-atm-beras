@extends('layouts.base')

@section('title', 'Detail Informasi Donatur')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Data Donatur</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="25%">Jenis</th>
                    <td>{{ $donatur->jenisDonatur->label }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $donatur->nama }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $donatur->alamat }}</td>
                </tr>
                <tr>
                    <th>Nomor Ponsel</th>
                    <td>{{ $donatur->nomor_ponsel }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <strong>Data Donasi Uang</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered border-primary mb-3">
                <tr>
                    <th width="25%">Jumlah Donasi</th>
                    <td>{{ $donatur->listDonasiUang->count() }}</td>
                </tr>
                <tr>
                    <th>Total Donasi</th>
                    <td>@rupiah($donatur->listDonasiUang->sum('nominal'))</td>
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
                @foreach ($donatur->listDonasiUang as $data)
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
            <strong>Data Donasi Beras</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered border-primary mb-3">
                <tr>
                    <th width="25%">Jumlah Donasi</th>
                    <td>{{ $donatur->listDonasiBeras->count() }}</td>
                </tr>
                <tr>
                    <th>Total Donasi</th>
                    <td>{{ $donatur->listDonasiBeras->sum('jumlah') }} kilogram</td>
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
                @foreach ($donatur->listDonasiBeras as $data)
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
