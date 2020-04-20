<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Input Penyewaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penyewaan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="mobil_id">Pilih Mobil</label>
                        <select name="mobil_id" id="mobil_id" class="form-control">
                            <option value="" selected>--- Pilih Mobil ---</option>
                            @forelse ($mobil as $row)
                            <option value="{{ $row->id }}">{{ $row->merek->merek }} {{ $row->varian }}
                                ({{ $row->tahun_keluaran }})</option>
                            @empty
                            <option value="">Tidak Ada Mobil</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pelanggan_id">Pilih Pelanggan</label>
                        <select name="pelanggan_id" id="pelanggan_id" class="form-control">
                            <option value="">--- Pilih Pelanggan ---</option>
                            @forelse ($pelanggan as $row)
                            <option value="{{ $row->id }}">{{ $row->nama_pelanggan }}</option>
                            @empty
                            <option value="">Tidak Ada Pelanggan</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga_sewa_id">Pilih Layanan</label>
                        <select name="harga_sewa" class="form-control" id="layanan">

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_sewa">Tanggal Sewa</label>
                        <input type="date" class="form-control" name="tanggal_sewa">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_sewa">Jumlah Mobil</label> <label class="tersedia"></label>
                        <input type="number" class="form-control" name="jumlah_mobil">
                    </div>
                    <div class="form-group">
                        <label for="foto_karyawan">Lama Sewa (Hari)</label>
                        <input type="number" class="form-control" name="lama_sewa">
                    </div>
                    <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>