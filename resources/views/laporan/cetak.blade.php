<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body>
    <h1>Donasi Uang</h1>
    <h3>Periode : <?= $startDate ?> s/d <?= $endDate ?></h3>
    <h3>Jumlah Donasi : <?= $donasiUang->count() ?></h3>
    <h3>Total Donasi : @rupiah($donasiUang->sum('nominal'))</h3>
    <table border="1px solid">
        <thead>
            <tr>
                <td>Tanggal</td>
                <td>Jenis Donatur</td>
                <td>Nama Donatur</td>
                <td>Nominal</td>
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

    <h1>Donasi Beras</h1>
    <h3>Periode : <?= $startDate ?> s/d <?= $endDate ?></h3>
    <h3>Jumlah Donasi : <?= $donasiBeras->count() ?></h3>
    <h3>Total Donasi : <?= $donasiBeras->sum('jumlah') ?> kilogram</h3>
    <table border="1px solid">
        <thead>
            <tr>
                <td>Tanggal</td>
                <td>Jenis Donatur</td>
                <td>Nama Donatur</td>
                <td>Nominal</td>
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
    
</body>
</html>