@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Dashboard</h1>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>@currency($pendapatan)</h3>
                        <p>Pendapatan (Bulanan)</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cash"></i>
                    </div>
                    <div class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $sewa }}</h3>

                        <p>Disewakan (Bulanan)</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <div class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $booking }}</h3>

                        <p>Bookings (Bulanan)</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <div class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $batal }}</h3>

                        <p>Dibatalkan (Bulanan)</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <div class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-success collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fa fa-info-circle"></i> TENTANG PEREMO APPS</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <p class="card-text text-justify">Selamat datang di PEREMO APPS. PEREMO adalah kepanjangan dari
                            Penyewaan
                            Rental Mobil yang dikhususkan untuk melakukan pencatatan atau pendataan pada transaksi
                            penyewaan mobil. Aplikasi ini dibuat sebagai salah satu syarat kelulusan di Universitas Bina
                            Sarana Informatika.</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                {{-- <div class="card card-primary collapsed-card">
                    <div class="card-header ">
                        <h5 class="card-title m-0">TENTANG PREMO APPS</h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div> --}}
            </div>
        </div>
</section>
@endsection