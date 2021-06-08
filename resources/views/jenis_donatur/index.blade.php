@extends('layouts.base')

@section('title', 'Jenis Donatur')

@section('ext')
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modalTambahJenisDonatur">
        Tambah Jenis Donatur
    </button>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table id="jenis_donatur_table" class="display">
                <thead>
                <tr>
                    <th>Label</th>
                    <th width="20%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($listJenisDonatur as $jenisDonatur)
                    <tr>
                    <td>{{$jenisDonatur->label}}</td>
                    <td>
                        <a href="#" class="btn btn-outline-warning btn-sm btn-edit" data-id="<?= $jenisDonatur->id;?>" data-label="<?= $jenisDonatur->label;?>"><i class="fas fa-pencil-alt"></i></a>
                        <a href="#" class="btn btn-outline-danger btn-sm btn-delete" data-id="<?= $jenisDonatur->id; ?>"><i class="far fa-trash-alt"></i></a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Tambah Jenis Donatur -->
    <div class="modal fade" id="modalTambahJenisDonatur" tabindex="-1" aria-labelledby="modalTambahJenisDonaturLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Tambah Jenis Donatur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'jenis_donatur.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                        {{ Form::label('label', 'Label') }}
                        {{ Form::text('label', '', ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Tambah', ['class' => 'btn btn-dark btn-sm']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Ubah Jenis Donatur -->
    <div class="modal fade" id="modalUbahJenisDonatur" tabindex="-1" aria-labelledby="modalUbahJenisDonaturLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Ubah Jenis Donatur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'jenis_donatur.update', 'method' => 'PUT']) !!}
                    {{ Form::hidden('id', '', ['class' => 'form-id']) }}
                    <div class="form-group">
                        {{ Form::label('label', 'Label') }}
                        {{ Form::text('label', '', ['class' => 'form-control form-label']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    {{ Form::submit('Ubah', ['class' => 'btn btn-warning btn-sm']) }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Jenis Donatur -->
    <div class="modal fade" id="modalDeleteJenisDonatur" tabindex="-1" aria-labelledby="modalDeleteDonaturLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Hapus Data Jenis Donatur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin menghapus data tersebut?
            </div>
            <div class="modal-footer">
                {!! Form::open(['route' => 'jenis_donatur.destroy', 'method' => 'DELETE']) !!}
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
            $('#jenis_donatur_table').DataTable();
        });

        $('.btn-edit').on('click', function() {
            const value_id = $(this).data('id');
            const value_label = $(this).data('label');

            $('.form-id').val(value_id);
            $('.form-label').val(value_label);

            $('#modalUbahJenisDonatur').modal('show');
        });

        $('.btn-delete').on('click', function() {
            const value_id = $(this).data('id');
            $('.form-id').val(value_id);
            $('#modalDeleteJenisDonatur').modal('show');
        });
    </script>
@endpush
