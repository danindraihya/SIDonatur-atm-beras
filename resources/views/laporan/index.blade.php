@extends('layouts.base')

@section('title', 'Laporan')

@section('content')
    <div class="card offset-md-3 col-md-6">
        <div class="card-body">
            <form action="{{ route('laporan.show') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Pilih Minggu</label>
                    <input type="week" class="form-control" name="week" required>
                </div>

                <button type="submit" class="btn btn-block btn-success">Tampilkan</button>
            </form>
        </div>
    </div>
@endsection
