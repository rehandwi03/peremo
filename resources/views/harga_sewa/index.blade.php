@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Harga Sewa Mobil</h1>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Harga Sewa Mobil</h3>
                    </div>
                    <form action="{{ route('harga_sewa.store') }}" method="POST" role="form">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="mobil_id">Mobil</label>
                                <select name="mobil_id" id="mobil_id" class="form-control">
                                    @forelse ($mobil as $row)
                                    <option value="{{ $row->id }}">{{ $row->merek->merek }} {{ $row->varian }}
                                        ({{ $row->tahun_keluaran }})
                                    </option>
                                    @empty
                                    <option value="">Tidak Ada Mobil</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tarif_sewa">Tarif Sewa</label>
                                <input type="number" class="form-control" name="tarif_sewa">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="10"
                                    class="form-control"></textarea>
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
                                    <th>Mobil</th>
                                    <th>Tarif Sewa</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($harga as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->mobil->merek->merek }} {{ $row->mobil->varian }}
                                        ({{ $row->mobil->tahun_keluaran }})</td>
                                    <td>@currency($row->tarif_sewa)</td>
                                    <td>{{ $row->keterangan }}</td>
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