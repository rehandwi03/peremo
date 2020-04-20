<div class="modal fade" id="BatalkanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Batalkan Penyewaan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('penyewaan.batalkan') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <input type="hidden" id="mobil_id" name="mobil_id">
                    <input type="hidden" id="jumlah_mobil" name="jumlah_mobil">
                    <p class="text-center">Yakin ingin membatalkan penyewaan ini ?</p>
                    <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger float-right" id="delete-btn">Batalkan</button>
                </form>
            </div>
        </div>
    </div>
</div>