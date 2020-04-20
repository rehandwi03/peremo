<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Edit Pelanggan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pelanggan.update','data') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="nama_karyawan">Nama Pelanggan</label>
                        <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="number" name="nomor_telp" class="form-control" id="nomor_telp" required>
                    </div>
                    <div class="form-group">
                        <label for="no_telp">Email Pelanggan</label>
                        <input type="email" name="email_pelanggan" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="foto_ktp">Foto KTP</label>
                        <input type="file" name="foto_ktp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat_karyawan">Alamat Pelanggan</label>
                        <textarea name="alamat_pelanggan" cols="30" rows="10" class="form-control" id="alamat"
                            required></textarea>
                    </div>
                    <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>