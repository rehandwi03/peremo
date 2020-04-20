@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Data User</h1>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                        class="fa fa-edit"></i> Tambah</button></h3>
            @include('user.create')
            {{-- <div class="float-right mr-3">
                <button type="button" class="btn btn-circle btn-sm btn-info" data-toggle="modal"
                    data-target="#exampleModal"><i class="ti-plus"></i></button><span
                    class="ml-2 font-normal text-dark">Tambah Mobil</span>
            </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nama Karyawan</th>
                        <th>Username</th>
                        <th>Created At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $row)
                    <tr>
                        <td>@foreach ($row->getRoleNames() as $role)
                            <sup class="badge badge-info">{{ $role }}</sup>
                            @endforeach
                            {{ $row->karyawan->nama_karyawan }}</td>
                        <td>
                            {{ $row->username }}
                        </td>
                        <td>{{ $row->created_at }}</td>
                        @include('user.edit')
                        @include('user.delete')
                        <td align=" center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-flat">Action</button>
                                <button type="button" class="btn btn-danger btn-flat dropdown-toggle"
                                    data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <button class="dropdown-item" data-toggle="modal" data-target="#EditModal"
                                        data-username={{ $row->username }} data-email={{ $row->email }}
                                        data-id={{ $row->id }}>Ubah</button>
                                    <button class="dropdown-item" data-toggle="modal" data-target="#DeleteModal"
                                        data-id={{ $row->id }}>Hapus</button>
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
@endsection
@section('js')
<script>
    $('#EditModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')
        var username = button.data('username')
        var email = button.data('email')
        
        var modal = $(this)
        console.log(id)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #username').val(username);
        modal.find('.modal-body #email').val(email);
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