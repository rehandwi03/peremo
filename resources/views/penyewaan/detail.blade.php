@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Detail Penyewaan</h1>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> PEREMO APPS
                                <small class="float-right">
                                    @if ($penyewaan->status_sewa != 0)
                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#PinjamkanModal" data-id={{ $penyewaan->id }}
                                        disabled>Sewakan</button>
                                    @else
                                    <button class="btn btn-sm btn-info" data-toggle="modal"
                                        data-target="#PinjamkanModal" data-id={{ $penyewaan->id }}
                                        data-jumlah_mobil={{ $penyewaan->jumlah_mobil }}
                                        data-mobil_id={{ $penyewaan->mobil->id }}>Sewakan</button>
                                    @endif
                                    @if ($penyewaan->status_sewa != 1)
                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#KembalikanModal" data-jumlah_mobil={{ $penyewaan->jumlah_mobil }}
                                        data-mobil_id={{ $penyewaan->mobil->id }} data-id={{ $penyewaan->id }}
                                        data-tanggal={{ $penyewaan->tanggal_kembali_seharusnya }}
                                        disabled>Kembalikan</button>
                                    @else
                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                        data-target="#KembalikanModal" data-jumlah_mobil={{ $penyewaan->jumlah_mobil }}
                                        data-mobil_id={{ $penyewaan->mobil->id }} data-id={{ $penyewaan->id }}
                                        data-tanggal={{ $penyewaan->tanggal_kembali_seharusnya }}
                                        data-tarif={{ $penyewaan->harga_sewa->tarif_sewa }}>Kembalikan</button>
                                    @endif
                                    @if ($penyewaan->status_sewa != 0)
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#BatalkanModal" data-jumlah_mobil={{ $penyewaan->jumlah_mobil }}
                                        data-mobil_id={{ $penyewaan->mobil->id }} data-id={{ $penyewaan->id }}
                                        disabled>Batalkan</button>
                                    @else
                                    <button class="btn btn-sm btn-danger" data-toggle="modal"
                                        data-target="#BatalkanModal" data-jumlah_mobil={{ $penyewaan->jumlah_mobil }}
                                        data-mobil_id={{ $penyewaan->mobil->id }}
                                        data-id={{ $penyewaan->id }}>Batalkan</button>
                                    @endif
                                    @if ($penyewaan->status_sewa !=2 )
                                    {{-- <a href="{{ route('penyewaan.invoice', $penyewaan->id) }}" target="_blank"
                                    class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a> --}}
                                    {{-- <button class="btn btn-sm btn-info" disabled>Print</button> --}}
                                    @else
                                    <a href="{{ route('penyewaan.invoice', $penyewaan->id) }}" target="_blank"
                                        class="btn btn-sm btn-info"><i class="fas fa-print"></i> Print</a>
                                    @endif
                                </small>
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4  invoice-col">
                            <address class="text-justify">
                                <strong>{{ $penyewaan->pelanggan->nama_pelanggan }}</strong><br>
                                {{ $penyewaan->pelanggan->alamat_pelanggan }}<br>
                                Telepon: {{ $penyewaan->pelanggan->no_telp_pelanggan }}<br>
                                Email: {{ $penyewaan->pelanggan->email }}
                            </address>
                        </div>
                        <!-- /.col -->
                        <!-- /.col -->
                        <div class="col-sm-4 offset-sm-1 invoice-col ">
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
                            <table class="table table-striped table-bordered">
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
                                <tbody class="text-center">
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
                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                handango imeem
                                plugg
                                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                            </p> --}}
                        </div>
                        <!-- /.col -->
                        <div class="col-6">
                            <p class="lead">Tanggal Kembali {{date('d-m-yy', strtotime( $penyewaan->tanggal_kembali))}}
                            </p>
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

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">

                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@include('penyewaan.pinjamkan')
@include('penyewaan.kembalikan')
@include('penyewaan.batalkan')
<!-- /.content -->
@endsection
@section('js')
<script>
    $('#PinjamkanModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
         modal.find('.modal-body #id').val(id);
    })
</script>
<script>
    $('#KembalikanModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')
        var jumlah_mobil = button.data('jumlah_mobil')
        var mobil_id = button.data('mobil_id')
        var tanggal_kembali_seharusnya = button.data('tanggal')
        var tarif = button.data('tarif')
        
        var modal = $(this)
         modal.find('.modal-body #id').val(id);
         modal.find('.modal-body #jumlah_mobil').val(jumlah_mobil);
         modal.find('.modal-body #mobil_id').val(mobil_id);
         modal.find('.modal-body #tanggal_kembali_seharusnya').val(tanggal_kembali_seharusnya);
         modal.find('.modal-body #tarif').val(tarif);
    })
</script>
<script>
    $('#BatalkanModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')
        var jumlah_mobil = button.data('jumlah_mobil')
        var mobil_id = button.data('mobil_id')
        
        var modal = $(this)
         modal.find('.modal-body #id').val(id);
         modal.find('.modal-body #jumlah_mobil').val(jumlah_mobil);
         modal.find('.modal-body #mobil_id').val(mobil_id);
    })
</script>
@endsection