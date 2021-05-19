@extends('layouts.base')

@section('title')
    Donasi Beras
@endsection

@section('ext')
  <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalTambahDonasiBeras">
    Tambah Donasi Beras
  </button>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
      <table id="donatur_table" class="display">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Nama Donatur</th>
            <th>Jumlah</th>
            <th width="20%">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($donasiBeras as $data)
            <tr>
                <td>{{ $data->formatted_date }}</td>
                <td>{{$data->donatur->nama}}</td>
                <td>@number($data->jumlah) kg</td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm btn-edit" data-id="<?= $data->id;?>" data-donatur="<?= $data->donatur->id;?>" data-jumlah="<?= $data->jumlah;?>">Ubah</a>
                    <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $data->id; ?>">Hapus</a>
                </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Tambah Donatur -->
  <div class="modal fade" id="modalTambahDonasiBeras" tabindex="-1" aria-labelledby="modalTambahDonasiBerasLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold">Donasi Beras</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! Form::open(['route' => 'donasi_beras.store', 'method' => 'POST']) !!}
          <div class="form-group">
              {{ Form::label('donatur', 'Nama Donatur') }}
              {{ Form::select('donatur', $listDonatur, 1, ['class' => 'form-control']) }}
          </div>
          <div class="form-group">
              {{ Form::label('jumlah', 'Jumlah (kilogram)') }}
              {{ Form::text('jumlah', '', ['class' => 'form-control']) }}
          </div>
        </div>
        <div class="modal-footer">
          {{ Form::submit('Tambah', ['class' => 'btn btn-dark btn-sm']) }}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit Donatur -->
  <div class="modal fade" id="modalUbahDonasiBeras" tabindex="-1" aria-labelledby="modalUbahDonasiBerasLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold">Ubah Donasi Uang</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! Form::open(['route' => 'donasi_beras.update', 'method' => 'PUT']) !!}
          {{ Form::hidden('id', '', ['class' => 'form-id']) }}
          <div class="form-group">
              {{ Form::label('donatur', 'Nama Donatur') }}
              {{ Form::select('donatur', $listDonatur, '1', ['class' => 'form-control form-donatur']) }}
          </div>
          <div class="form-group">
              {{ Form::label('jumlah', 'Jumlah (kilogram)') }}
              {{ Form::text('jumlah', '', ['class' => 'form-control form-jumlah']) }}
          </div>
        </div>
        <div class="modal-footer">
          {{ Form::submit('Ubah', ['class' => 'btn btn-warning btn-sm']) }}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Delete Donatur -->
  <div class="modal fade" id="modalHapusDonasiBeras" tabindex="-1" aria-labelledby="modalHapusDonasiBerasLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title fw-bold">Hapus Data Donatur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda yakin menghapus data tersebut?
        </div>
        <div class="modal-footer">
          {!! Form::open(['route' => 'donasi_beras.destroy', 'method' => 'DELETE']) !!}
            {{ Form::hidden('id', '', ['class' => 'form-id']) }}
            {{ Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) }}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<script>
  $(document).ready(function () {
    $('#donatur_table').DataTable();
  });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.btn-edit').on('click', function() {
      const value_id = $(this).data('id');
      const value_donatur = $(this).data('donatur');
      const value_jumlah = $(this).data('jumlah');

      $('.form-id').val(value_id);
      $('.form-donatur').val(value_donatur).trigger('change');
      $('.form-jumlah').val(value_jumlah);

      $('#modalUbahDonasiBeras').modal('show');
    });

    $('.btn-delete').on('click', function() {
      const value_id = $(this).data('id');
      $('.form-id').val(value_id);
      $('#modalHapusDonasiBeras').modal('show');
    });
  });
</script>
@endpush
