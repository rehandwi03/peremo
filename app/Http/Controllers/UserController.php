<?php

namespace App\Http\Controllers;

use App\Karyawan;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
    public function index()
    {
        $title = "User";
        $karyawan = Karyawan::orderBy('nama_karyawan', 'ASC')->get();
        $user = User::orderBy('created_at', 'ASC')->get();
        $role = Role::orderBy('name', 'ASC')->get();
        // dd($user);
        return view('user.index', compact(['title', 'karyawan', 'user', 'role']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'karyawan_id' => 'required|string|numeric',
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        // dd($request);
        $user = User::firstOrCreate(
            [
                'username' => $request->username,
                'karyawan_id' => $request->karyawan_id,
            ],
            [
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]
        );
        $user->assignRole($request->role_id);
        return redirect()->route('user.index')->with(['success' => 'User berhasil ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            // 'karyawan_id' => 'required|string|numeric',
            'username' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'nullable|min:6|confirmed',
        ]);
        $user = User::where('id', '=', $request->id)->first();
        $pass = !empty($request->password) ? bcrypt($request->password) : $user->password;
        $user->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $pass
        ]);
        // dd($user->password);
        return redirect()->route('user.index')->with(['success' => 'User berhasil diubah!']);
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return redirect()->route('user.index')->with(['success' => 'User berhasil dihapus!']);
    }
}
