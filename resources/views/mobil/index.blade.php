@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Data Mobil</h1>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                        class="fa fa-edit"></i> Tambah</button></h3>
            @include('mobil.create')
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
                        <th>#</th>
                        <th>Kode Mobil</th>
                        <th>Merek</th>
                        <th>Varian</th>
                        <th>Plat Nomor</th>
                        <th>Harga Mobil</th>
                        <th>Jumlah Unit</th>
                        <th>Foto Mobil</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mobil as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->kode_mobil }}</td>
                        <td>{{ $row->merek->merek }}</td>
                        <td>{{ $row->varian }}
                            <sup class="badge badge-success">{{ $row->tahun_keluaran }}</sup></td>
                        <td>{{ $row->plat_nomor }}</td>
                        <td>@currency($row->harga_mobil)</td>
                        <td>{{ $row->unit_tersedia }}</td>
                        <td align="center"><img src="{{ asset('uploads/mobil/'. $row->foto_mobil) }}" alt="Foto Mobil"
                                width="70">
                        </td>
                        <td align="center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-flat">Action</button>
                                <button type="button" class="btn btn-danger btn-flat dropdown-toggle"
                                    data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <div class="dropdown-menu" role="menu">
                                    <button class="dropdown-item" data-toggle="modal" data-target="#EditModal"
                                        data-id={{ $row->id }} data-varian={{ $row->varian }}
                                        data-tahun={{ $row->tahun_keluaran }} data-kode={{ $row->kode_mobil }}
                                        data-plat={{ $row->plat_nomor }} data-harga={{ $row->harga_mobil }}
                                        data-unit={{ $row->unit_tersedia }}>Ubah</button>
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
    @include('mobil.edit')
    @include('mobil.delete')
    <!-- /.card -->
</section>
@endsection
@section('js')
<script>
    $('#EditModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')
        var varian = button.data('varian')
        var tahun = button.data('tahun')
        var kode = button.data('kode')
        var plat = button.data('plat')
        var harga = button.data('harga')
        var unit = button.data('unit')
        
        var modal = $(this)
        console.log(id)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #varian').val(varian);
        modal.find('.modal-body #tahun').val(tahun);
        modal.find('.modal-body #kode').val(kode);
        modal.find('.modal-body #plat').val(plat);
        modal.find('.modal-body #harga').val(harga);
        modal.find('.modal-body #unit').val(unit);
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