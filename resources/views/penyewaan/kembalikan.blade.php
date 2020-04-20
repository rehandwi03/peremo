<div class="modal fade" id="KembalikanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Kembalikan Mobil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penyewaan.kembalikan') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="mobil_id" name="mobil_id">
                    <input type="hidden" id="jumlah_mobil" name="jumlah_mobil">
                    <input type="hidden" id="tanggal_kembali_seharusnya" name="tanggal_kembali_seharusnya">
                    <input type="hidden" id="tarif" name="tarif">
                    <p class="text-center">Yakin ingin kembalikan mobil ini ?</p>
                    <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-right" id="delete-btn">Kembalikan</button>
                </form>
            </div>
        </div>
    </div>
</div>