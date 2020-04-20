@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Merek Mobil</h1>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Merek Mobil</h3>
                    </div>
                    <form action="{{ route('mobil.merek_mobil.store') }}" method="POST" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Merek Mobil</label>
                                <input type="text" name="merek_mobil"
                                    class="form-control {{ $errors->has('merek_mobil') ? 'is-invalid':'' }}"
                                    id="merek_mobil">
                                <div class="invalid-feedback">
                                    Masukan merek mobil.
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
                        <h3 class="card-title">List Merek Mobil</h3>
                    </div>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Merek Mobil</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @include('mobil.merek_mobil.delete')
                                @foreach ($merek as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->merek }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td align="center">
                                        <button class="badge badge-danger" data-toggle="modal"
                                            data-target="#DeleteModalMerek" data-id={{ $row->id }}><i
                                                class="fa fa-trash"></i>
                                            Hapus</button>
                                    </td>
                                </tr>
                                @endforeach
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
@section('js')
<script>
    $('#DeleteModalMerek').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')
        
        var modal = $(this)
        console.log(id)
        modal.find('.modal-body #id').val(id);
    })
</script>
@endsection