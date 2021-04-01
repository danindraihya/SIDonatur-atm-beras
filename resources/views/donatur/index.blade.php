@extends('layouts.base')

@section('title', 'Donatur')

@section('ext')
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahDonatur">
    Tambah Donatur
  </button>
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <table id="table_id" class="display">
        <thead>
          <tr>
            <th>Nama Donatur</th>
            <th>Alamat</th>
            <th>Nomor Ponsel</th>
            <th width="20%">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($listDonatur as $donatur)
            <tr>
            <td>{{$donatur->nama}}</td>
              <td>{{$donatur->alamat}}</td>
              <td>{{$donatur->nomor_ponsel}}</td>
              <td>  
                <a href="#" class="btn btn-warning btn-edit" data-id="<?= $donatur->id;?>" data-nama="<?= $donatur->nama;?>" data-jenis_donatur="<?= $donatur->jenis_donatur_id ?>" data-alamat="<?= $donatur->alamat;?>" data-nomor_ponsel="<?= $donatur->nomor_ponsel;?>">Edit</a>
                <a href="#" class="btn btn-danger btn-delete" data-id="<?= $donatur->id; ?>">Delete</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table> 
    </div>
  </div>

  <!-- Modal Tambah Donatur -->
  <div class="modal fade" id="modalTambahDonatur" tabindex="-1" aria-labelledby="modalTambahDonaturLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalTambahDonaturLabel">Tambah Donatur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! Form::open(['url' => '/donatur/store', 'method' => 'POST']) !!}
          <div class="form-group">
              {{Form::label('nama', 'Nama')}}
              {{Form::text('nama', '', ['class' => 'form-control'])}}            
          </div>
          <div class="form-group">
              {{Form::label('jenis_donatur', 'Jenis Donatur')}}
              {{Form::select('jenis_donatur', ['1' => 'Umum', '2' => 'Organisasi', '3' => 'Warga RW 16'], '1', ['class' => 'form-control'])}}            
          </div>
          <div class="form-group">
              {{Form::label('alamat', 'Alamat')}}
              {{Form::text('alamat', '', ['class' => 'form-control'])}}            
          </div>
          <div class="form-group">
            {{Form::label('nomor_ponsel', 'Nomor Ponsel')}}
            {{Form::text('nomor_ponsel', '', ['class' => 'form-control'])}}            
          </div> 
        </div>
        <div class="modal-footer">
          {{Form::submit('Tambah', ['class' => 'btn btn-primary'])}}
          {!! Form::close() !!} 
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit Donatur -->
  <div class="modal fade" id="modalEditDonatur" tabindex="-1" aria-labelledby="modalEditDonaturLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEditDonaturLabel">Ubah Data Donatur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! Form::open(['url' => '/donatur/update', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
          {{Form::hidden('id', '', ['class' => 'form-id'])}}
          <div class="form-group">
              {{Form::label('nama', 'Nama')}}
              {{Form::text('nama', '', ['class' => 'form-control form-nama'])}}            
          </div>
          <div class="form-group">
              {{Form::label('jenis_donatur', 'Jenis Donatur')}}
              {{Form::select('jenis_donatur', ['1' => 'Umum', '2' => 'Organisasi', '3' => 'Warga RW 16'], '1', ['class' => 'form-control form-jenis_donatur', ])}}            
          </div>
          <div class="form-group">
              {{Form::label('alamat', 'Alamat')}}
              {{Form::text('alamat', '', ['class' => 'form-control form-alamat'])}}            
          </div>
          <div class="form-group">
            {{Form::label('nomor_ponsel', 'Nomor Ponsel')}}
            {{Form::text('nomor_ponsel', '', ['class' => 'form-control form-nomor_ponsel'])}}            
          </div> 
        </div>
        <div class="modal-footer">
          {{Form::submit('Edit', ['class' => 'btn btn-danger'])}}
          {!! Form::close() !!} 
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Delete Donatur -->
  <div class="modal fade" id="modalDeleteDonatur" tabindex="-1" aria-labelledby="modalDeleteDonaturLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalDeleteDonaturLabel">Hapus Data Donatur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda yakin menghapus data tersebut?
        </div>
        <div class="modal-footer">
          {!! Form::open(['url' => '/donatur/destroy', 'method' => 'DELETE', 'enctype' => 'multipart/form-data']) !!}
            {{Form::hidden('id', '', ['class' => 'form-id'])}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
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
      $('#table_id').DataTable();
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.btn-edit').on('click', function() {
        // get data from button edit
        var value_id = $(this).data('id');
        var value_nama = $(this).data('nama');
        var value_jenis_donatur = $(this).data('jenis_donatur');
        var value_alamat = $(this).data('alamat');
        var value_nomor_ponsel = $(this).data('nomor_ponsel');
        // Set data to Form Edit
        console.log(value_id);
        $('.form-id').val(value_id);
        $('.form-nama').val(value_nama);
        $('.form-jenis_donatur').val(value_jenis_donatur).trigger('change');
        $('.form-alamat').val(value_alamat);
        $('.form-nomor_ponsel').val(value_nomor_ponsel);
        // Call Modal Edit
        $('#modalEditDonatur').modal('show');
      });

      $('.btn-delete').on('click', function() {
        var value_id = $(this).data('id');
        $('.form-id').val(value_id);
        // Call Modal Edit
        $('#modalDeleteDonatur').modal('show');
      });
    });
  </script>
@endpush