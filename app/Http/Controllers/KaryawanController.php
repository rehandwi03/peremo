<?php

namespace App\Http\Controllers;

use App\Karyawan;
use Illuminate\Http\Request;
use File;
use Image;

class KaryawanController extends Controller
{
    public function index()
    {
        $title = "Karyawan";
        $karyawan = Karyawan::orderBy('nama_karyawan', 'ASC')->get();
        return view('karyawan.index', compact(['title', 'karyawan']));
    }

    public function store(Request $request)
    {
        // dd($request);
        $val = $this->validate($request, [
            'nama_karyawan' => 'required|string|max:35',
            'alamat_karyawan' => 'required|string',
            'foto_ktp' => 'required|image|mimes:jpg,png,jpeg|max:4096',
            'foto_karyawan' => 'required|image|mimes:jpg,png,jpeg|max:1024',
            'jenis_kelamin' => 'required|string',
            'nomor_telp' => 'required|numeric|string',
        ]);
        if ($request->hasFile('foto_ktp')) {
            $foto_ktp = $this->saveFile($request->name, $request->file('foto_ktp'));
        }
        if ($request->hasFile('foto_karyawan')) {
            $foto_karyawan = $this->saveFile($request->name, $request->file('foto_karyawan'));
        }
        $karyawan = Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'alamat_karyawan' => $request->alamat_karyawan,
            'foto_ktp_karyawan' => $foto_ktp,
            'foto_karyawan' => $foto_karyawan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp_karyawan' => $request->nomor_telp
        ]);
        return redirect()->route('karyawan.index')->with(['success' => 'Berhasil menambahkan karyawan']);
    }

    public function update(Request $request)
    {
        $val = $this->validate($request, [
            'nama_karyawan' => 'required|string|max:35',
            'alamat_karyawan' => 'required|string',
            'foto_ktp' => 'nullable|image|mimes:jpg,png,jpeg|max:4096',
            'foto_karyawan' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'jenis_kelamin' => 'required|string',
            'nomor_telp' => 'required|numeric|string',
        ]);
        $karyawan = Karyawan::where('id', '=', $request->id)->first();
        if ($request->hasFile('foto_ktp')) {
            $file = 'uploads/datakaryawan/' . $karyawan->foto_ktp_karyawan;
            $delete = File::delete($file);
            $foto_ktp = $this->saveFile($request->name, $request->file('foto_ktp'));
        } else {
            $foto_ktp = $karyawan->foto_ktp_karyawan;
        }

        if ($request->hasFile('foto_karyawan')) {
            $file = 'uploads/datakaryawan/' . $karyawan->foto_karyawan;
            $delete = File::delete($file);
            $foto_karyawan = $this->saveFile($request->name, $request->file('foto_karyawan'));
        } else {
            $foto_karyawan = $karyawan->foto_karyawan;
        }

        $karyawan->update([
            'nama_karyawan' => $request->nama_karyawan,
            'alamat_karyawan' => $request->alamat_karyawan,
            'foto_ktp_karyawan' => $foto_ktp,
            'foto_karyawan' => $foto_karyawan,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp_karyawan' => $request->nomor_telp
        ]);
        return redirect()->route('karyawan.index')->with(['success' => 'Data karyawan berhasil diubah!']);
    }

    public function destroy(Request $request)
    {
        $karyawan = Karyawan::findOrFail($request->id);
        $karyawan->delete();
        return redirect()->route('karyawan.index')->with(['success' => 'Data karyawan berhasil dihapus!']);
    }

    private function saveFile($name, $photo)
    {
        // $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();

        $path = public_path('uploads/datakaryawan');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        Image::make($photo)->resize(300, 300)->save($path . '/' . $images);
        return $images;
    }
}
