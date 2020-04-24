<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PEREMO APPS | Laporan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <div class="container mt-4">
            <section class="">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h2 class="page-header">
                            Laporan Penghasilan
                        </h2>
                        <h5>Periode : {{ $dari }} s/d {{ $ke }}</h5>
                    </div>
                    <!-- /.col -->
                </div>


                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Mobil</th>
                                    <th>Jumlah Mobil</th>
                                    <th>Denda</th>
                                    <th>Subtotal</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($penyewaan as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{date('d-m-yy', strtotime($row->created_at))}}</td>
                                    <td>{{ $row->mobil->merek->merek }} {{ $row->mobil->varian }}
                                        ({{ $row->mobil->tahun_keluaran }})</td>
                                    <td align="center">{{ $row->jumlah_mobil }}</td>
                                    <td>@currency($row->denda)</td>
                                    <td>@currency($row->subtotal)</td>
                                    <td>@currency($row->total_harga)</td>
                                </tr>
                                @empty
                                <td colspan="4">Tidak ada transaksi</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- ./wrapper -->
</body>

</html>