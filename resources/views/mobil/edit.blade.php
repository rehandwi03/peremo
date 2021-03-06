<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Mobil Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mobil.update', 'data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Merek</label>
                        <select name="merek_id" class="form-control" required>
                            @foreach ($merek as $row)
                            <option value="{{ $row->id }}">{{ $row->merek }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label>Varian</label>
                        <input type="text" class="form-control" name="varian" required id="varian">
                    </div>
                    <div class="form-group">
                        <label>Tahun Keluaran</label>
                        <input type="number" class="form-control" name="tahun_keluaran" required id="tahun">
                    </div>
                    <div class="form-group">
                        <label>Kode Mobil</label>
                        <input type="text" class="form-control" name="kode_mobil" required id="kode">
                    </div>
                    <div class="form-group">
                        <label>Plat Nomor</label>
                        <input type="text" class="form-control" name="plat_nomor" required id="plat">
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required id="harga">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Unit</label>
                        <input type="number" name="jumlah_unit" class="form-control" required id="unit">
                    </div>
                    <div class="form-group">
                        <label>Foto Mobil</label>
                        <input type="file" name="foto_mobil" class="form-control-file">
                    </div>
                    <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>