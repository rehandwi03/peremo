@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Data Pelanggan</h1>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                        class="fa fa-edit"></i> Tambah</button></h3>
            {{-- <div class="float-right mr-3">
                <button type="button" class="btn btn-circle btn-sm btn-info" data-toggle="modal"
                    data-target="#exampleModal"><i class="ti-plus"></i></button><span
                    class="ml-2 font-normal text-dark">Tambah Mobil</span>
            </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pelanggan</th>
                        <th>Email Pelanggan</th>
                        <th>Nomor Telepon</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto KTP</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nama_pelanggan }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->no_telp_pelanggan }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td>
                            <img src="{{ asset('uploads/pelanggan/'. $row->foto_ktp_pelanggan) }}" alt="Foto KTP"
                                width="70">
                        </td>
                        <td>{{ $row->alamat_pelanggan }}</td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-flat">Action</button>
                                <button type="button" class="btn btn-danger btn-flat dropdown-toggle"
                                    data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <button class="dropdown-item" data-toggle="modal" data-target="#EditModal"
                                        data-id={{$row->id}} data-nama_pelanggan={{ $row->nama_pelanggan }}
                                        data-nomor_telp={{ $row->no_telp_pelanggan }} data-email={{ $row->email }}
                                        data-alamat={{ $row->alamat_pelanggan }}>Ubah</button>
                                    <button class="dropdown-item" data-toggle="modal" data-target="#DeleteModal"
                                        data-id={{$row->id}}>Hapus</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
@include('pelanggan.create')
@include('pelanggan.edit')
@include('pelanggan.delete')
@section('js')
<script>
    $('#EditModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')
        var nama_pelanggan = button.data('nama_pelanggan')
        var nomor_telp = button.data('nomor_telp')
        var email = button.data('email')
        var alamat = button.data('alamat')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nama_pelanggan').val(nama_pelanggan);
        modal.find('.modal-body #nomor_telp').val(nomor_telp);
        modal.find('.modal-body #email').val(email);
        modal.find('.modal-body #alamat').val(alamat);
        
    })
</script>
<script>
    $('#DeleteModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id);
    })
</script>
@endsection
@endsection