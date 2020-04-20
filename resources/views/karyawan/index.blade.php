@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Data Karyawan</h1>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                        class="fa fa-edit"></i> Tambah</button></h3>
            @include('karyawan.create')
            {{-- <div class="float-right mr-3">
                <button type="button" class="btn btn-circle btn-sm btn-info" data-toggle="modal"
                    data-target="#exampleModal"><i class="ti-plus"></i></button><span
                    class="ml-2 font-normal text-dark">Tambah Mobil</span>
            </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover" data-form="deleteForm">
                <thead>
                    <tr>
                        <th>Foto Karyawan</th>
                        <th>Nama Karyawan</th>
                        <th>Jenis Kelamin</th>
                        <th>Foto KTP</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $row)
                    <tr>
                        <td class="text-center"><img src="{{ asset('uploads/datakaryawan/'.$row->foto_karyawan) }}"
                                alt="Foto Karyawan" width="50">
                        </td>
                        <td>{{ $row->nama_karyawan }}</td>
                        <td>{{ $row->jenis_kelamin }}</td>
                        <td class="text-center"><img src="{{ asset('uploads/datakaryawan/'.$row->foto_ktp_karyawan) }}"
                                alt="Foto KTP" width="50"></td>
                        <td>{{ $row->no_telp_karyawan }}</td>
                        <td>{{ $row->alamat_karyawan }}</td>
                        <td>
                            @include('karyawan.edit')
                            @include('karyawan.delete')
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-flat">Action</button>
                                <button type="button" class="btn btn-danger btn-flat dropdown-toggle"
                                    data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <button class="dropdown-item" data-toggle="modal" data-target="#EditModal"
                                        data-namakaryawan="{{ $row->nama_karyawan }}" data-jk={{ $row->jenis_kelamin }}
                                        data-no_telp_karyawan={{ $row->no_telp_karyawan }}
                                        data-alamat={{ $row->alamat_karyawan }} data-id={{$row->id}}>Ubah</button>
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
@section('js')
<script>
    $('#EditModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')
        var nama_karyawan = button.data('namakaryawan')
        // var jenis_kelamin = button.data('jk')
        var no_telp_karyawan = button.data('no_telp_karyawan')
        var alamat_karyawan = button.data('alamat')
        var modal = $(this)
        console.log(id)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nama_karyawan').val(nama_karyawan);
        modal.find('.modal-body #no_telp_karyawan').val(no_telp_karyawan);
        modal.find('.modal-body #alamat_karyawan').val(alamat_karyawan);
    })
</script>
<script>
    $('#DeleteModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        console.log(id)
        modal.find('.modal-body #id').val(id);
    })
</script>
@endsection
@endsection