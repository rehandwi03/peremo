@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Role</h1>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Role</h3>
                    </div>
                    <form action="" method="POST" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Role</label>
                                <input type="text" name="name"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name">
                                <div class="invalid-feedback">
                                    Masukan nama role.
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Role</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Role</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($role as $rl)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $rl->name }}</td>
                                    <td>{{ $rl->created_at }}</td>
                                    <td>
                                        <form action="{{ route('role.destroy', $rl->id) }}" method="POST"
                                            class="form-delete" id="form-delete">
                                            @csrf
                                            @method('DELETE')
                                            <button class="badge badge-danger"><i class="fa fa-trash"></i>
                                                Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card -->
</section>
<!-- /.modal -->
@endsection