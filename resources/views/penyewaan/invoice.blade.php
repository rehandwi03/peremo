<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PEREMO APPS | Invoice</title>
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
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <i class="fas fa-globe"></i> PEREMO APPS
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address class="text-justify">
                        <strong>{{ $penyewaan->pelanggan->nama_pelanggan }}</strong><br>
                        {{ $penyewaan->pelanggan->alamat_pelanggan }}<br>
                        Telepon: {{ $penyewaan->pelanggan->no_telp_pelanggan }}<br>
                        Email: {{ $penyewaan->pelanggan->email }}
                    </address>
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Faktur: #{{ $penyewaan->faktur }}</b><br>
                    <br>
                    <b>Tanggal Sewa:</b> {{date('d-m-yy', strtotime( $penyewaan->tanggal_sewa))}}<br>
                    <b>Tanggal Kembali Seharusnya:</b>
                    {{date('d-m-yy', strtotime( $penyewaan->tanggal_kembali_seharusnya))}}

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th># Faktur</th>
                                <th>Mobil</th>
                                <th>Jumlah Mobil</th>
                                <th>Layanan</th>
                                <th>Subtotal</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#{{ $penyewaan->faktur }}</td>
                                <td>{{ $penyewaan->mobil->merek->merek }} {{ $penyewaan->mobil->varian }}
                                    ({{ $penyewaan->mobil->tahun_keluaran }})</td>
                                <td>{{ $penyewaan->jumlah_mobil }}</td>
                                <td>{{ $penyewaan->harga_sewa->keterangan }}</td>
                                <td>@currency($penyewaan->subtotal)</td>
                                <td>@currency($penyewaan->total_harga)</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                    {{-- <p class="lead">Payment Methods:</p>
                    <img src="../../dist/img/credit/visa.png" alt="Visa">
                    <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                    <img src="../../dist/img/credit/american-express.png" alt="American Express">
                    <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango
                        imeem plugg dopplr
                        jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p> --}}
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <p class="lead">Tanggal Kembali {{date('d-m-yy', strtotime( $penyewaan->tanggal_kembali))}}</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>@currency($penyewaan->subtotal)</td>
                            </tr>
                            <tr>
                                <th>Denda</th>
                                <td>@currency($penyewaan->denda)</td>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>@currency($penyewaan->total_harga)</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
</body>

</html>