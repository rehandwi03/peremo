<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Input Karyawan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_karyawan">Nama Karyawan</label>
                        <input type="text" name="nama_karyawan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="foto_ktp">Foto KTP</label>
                        <input type="file" name="foto_ktp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="foto_karyawan">Foto Karyawan</label>
                        <input type="file" name="foto_karyawan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="number" name="nomor_telp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat_karyawan">Alamat Karyawan</label>
                        <textarea name="alamat_karyawan" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>