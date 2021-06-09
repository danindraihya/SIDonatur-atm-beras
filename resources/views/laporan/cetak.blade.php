<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css" media="all">--}}
    <title>Laporan</title>
</head>
<body class="has-background-white container">
    <table border="0px">
        <tr>
            <td colspan="3"><h2>Donasi Uang</h2></td>
        </tr>
        <tr>
            <td><strong>Periode</strong></td>
            <td>:</td>
            <td>{{ $startDate }} s.d. {{ $endDate }}</td>
        </tr>
        <tr>
            <td><strong>Jumlah Donasi</strong></td>
            <td>:</td>
            <td>{{ $donasiUang->count() }} donasi</td>
        </tr>
        <tr>
            <td><strong>Total Donasi</strong></td>
            <td>:</td>
            <td>@rupiah($donasiUang->sum('nominal'))</td>
        </tr>
    </table>
    <br>
    <table border="1px solid" style="width: 100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jenis Donatur</th>
                <th>Nama Donatur</th>
                <th>Nominal</th>
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

    <table border="0px">
        <tr>
            <td colspan="3"><h2>Donasi Uang</h2></td>
        </tr>
        <tr>
            <td><strong>Periode</strong></td>
            <td>:</td>
            <td>{{ $startDate }} s.d. {{ $endDate }}</td>
        </tr>
        <tr>
            <td><strong>Jumlah Donasi</strong></td>
            <td>:</td>
            <td>{{ $donasiBeras->count() }} donasi</td>
        </tr>
        <tr>
            <td><strong>Total Donasi</strong></td>
            <td>:</td>
            <td>@number($donasiBeras->sum('jumlah')) kilogram</td>
        </tr>
    </table>
    <br>
    <table border="1px solid" style="width: 100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jenis Donatur</th>
                <th>Nama Donatur</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donasiBeras as $data)
                <tr>
                    <td>{{ $data->formatted_date }}</td>
                    <td>{{ $data->donatur->jenisDonatur->label }}</td>
                    <td>{{ $data->donatur->nama }}</td>
                    <td>@number($data->jumlah) kg</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
