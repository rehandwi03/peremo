<div class="modal fade" id="LogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Logout</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <input type="hidden" id="id" name="id">
                    <p class="text-center">Yakin ingin keluar dari aplikasi ?</p>
                    <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger float-right" id="delete-btn">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>