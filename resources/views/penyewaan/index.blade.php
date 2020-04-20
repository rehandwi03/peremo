@extends('template.master')
@section('dhead')
<h1 class="m-0 text-dark">Data Penyewaan</h1>
@endsection
@section('content')
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i
                        class="fa fa-edit"></i> Tambah</button></h3>
            {{-- <div class="float-right mr-3">
                <button type="button" class="btn btn-circle btn-sm btn-info" data-toggle="modal"
                    data-target="#exampleModal"><i class="ti-plus"></i></button><span
                    class="ml-2 font-normal text-dark">Tambah Mobil</span>
            </div> --}}
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover text-center" data-form="deleteForm">
                <thead>
                    <tr>
                        <th>Faktur</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal Pinjam / Kembali</th>
                        <th>Jumlah Mobil</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penyewaan as $row)
                    <tr>
                        <td>#{{ $row->faktur }}</td>
                        <td>{{ $row->pelanggan->nama_pelanggan }}</td>
                        <td>{{date('d-m-yy', strtotime($row->tanggal_sewa))}} /
                            {{date('d-m-yy', strtotime($row->tanggal_kembali_seharusnya))}}
                        </td>
                        <td>{{ $row->jumlah_mobil }}</td>
                        <td>@currency($row->subtotal)</td>
                        <td>
                            @php
                            if ($row->status_sewa == 0) {
                            $status = 'Pending';
                            $css = 'secondary';
                            }elseif ($row->status_sewa == 1) {
                            $status='Booking';
                            $css = 'primary';
                            }elseif ($row->status_sewa == 2){
                            $status = 'Returns';
                            $css = 'success';
                            }else{
                            $status = 'Cancel';
                            $css = 'danger';
                            }
                            @endphp
                            <label class="badge badge-{{$css}}">{{ $status }}</label>
                        </td>
                        <td><a href="{{ route('penyewaan.show',  $row->id) }}"
                                class="btn btn-sm btn-flat btn-info">Detail</a>
                            {{-- <button class="btn btn-sm btn-flat btn-success">Print</button></td> --}}
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
@include('penyewaan.create')
@section('js')
<script type="text/javascript">
    var today = new Date().toISOString().split('T')[0];
    document.getElementsByName("tanggal_sewa")[0].setAttribute('min', today);
</script>
<script>
    $('#mobil_id').on('change', function(e){
        var mobil_id = e.target.value;        //ajax
        $('#layanan').empty()
        $('.tersedia').empty()
        $.get('/harga_sewa/mobil/' + mobil_id, function(data){
            //success
            $.each(data, function (index, obj) {
                var output = (obj.tarif_sewa/1000).toFixed(3);
                $('#layanan').append('<option value="'+obj.id+'">'+obj.keterangan+' - Rp. '+output+'</option>')
            });
        });
        $.get('/harga_sewa/unit/' + mobil_id, function (data) {  
            console.log(data);
            $('.tersedia').html('(Mobil tersedia : ' +data.unit_tersedia+ ')');
        });
    });
</script>
<script>
    $('#EditModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget)
        var id = button.data('id')
        var nama_karyawan = button.data('namakaryawan')
        // var jenis_kelamin = button.data('jk')
        var no_telp_karyawan = button.data('no_telp_karyawan')
        var alamat_karyawan = button.data('alamat')
        var modal = $(this)
        console.log(id)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #nama_karyawan').val(nama_karyawan);
        modal.find('.modal-body #no_telp_karyawan').val(no_telp_karyawan);
        modal.find('.modal-body #alamat_karyawan').val(alamat_karyawan);
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
@endsection