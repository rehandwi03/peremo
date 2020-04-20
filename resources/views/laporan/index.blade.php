@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Laporan</h1>
@endsection
@section('content')
<section class="content">
    <div class="card">
        {{-- <div class="card-header">
            <h3 class="card-title">Input masks</h3>
        </div> --}}
        <div class="card-body">
            <form action="{{ route('penyewaan.laporan.show') }}" method="post">
                @csrf
                <!-- Date dd/mm/yyyy -->
                <div class="form-group">
                    <label>Dari tanggal :</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" name="dari">
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->

                <!-- Date mm/dd/yyyy -->
                <div class="form-group">
                    <label>Ke tanggal :</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" name="ke">
                    </div>
                    <!-- /.input group -->
                </div>
                <!-- /.form group -->
                <div class="form-group">
                    <button class="btn btn-flat btn-primary"><i class="fas fa-print"></i> Cetak</button>
                </div>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
@endsection