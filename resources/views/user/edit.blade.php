<div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Edit User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update', 'data') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="id" name="id" value="">

                    {{-- <div class="form-group">
                        <label for="karyawan_id">Nama Karyawan</label>
                        <select name="karyawan_id" class="form-control">
                            @forelse ($karyawan as $row)
                            <option value="{{ $row->id }}">{{ $row->nama_karyawan }}</option>
                    @empty
                    <option value="">Data Tidak ada</option>
                    @endforelse
                    </select>
            </div> --}}
            {{-- <div class="form-group">
                        <label for="role_id">Masukan Role</label>
                        <select name="" id="" class="form-control">
                            @foreach ($role as $rl)
                            <option value="{{ $rl->id }}">{{ $rl->name }}</option>
            @endforeach
            </select>
        </div> --}}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" required id="username">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required id="email">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>
        <button type="button" class="btn btn-default float-left" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>
</div>
</div>
</div>