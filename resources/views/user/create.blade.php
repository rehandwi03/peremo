<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Input User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="karyawan_id">Nama Karyawan</label>
                        <select name="karyawan_id" class="form-control">
                            @forelse ($karyawan as $row)
                            <option value="{{ $row->id }}">{{ $row->nama_karyawan }}</option>
                            @empty
                            <option value="">Data Tidak ada</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Masukan Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @forelse ($role as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @empty
                            <option value="">Tidak Ada Data</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>