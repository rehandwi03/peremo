<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $title = 'Role';
        $role = Role::orderBy('name', 'ASC')->get();
        return view('role.index', compact(['role', 'title']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string'
        ]);

        $role = Role::firstOrCreate(['name' => $request->name]);
        return redirect()->route('role.index')->with(['success' => 'Role Berhasil Ditambahkan']);
    }

    public function destroy($id)
    {
        try {
            $role = Role::findOrFail($id);
            $role->delete();
            return redirect()->back()->with(['success' => 'Role: ' . $role->name . ' Dihapus']);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'Role tidak bisa dihapus, karena role sedang dipakai']);
        }
    }
}
