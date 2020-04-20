<?php

namespace App\Http\Controllers;

use App\Pelanggan;
use Illuminate\Http\Request;
use File;
use Image;

class PelangganController extends Controller
{
    public function index()
    {
        $title = "Pelanggan";
        $pelanggan = Pelanggan::orderBy('created_at')->get();
        return view('pelanggan.index', compact('title', 'pelanggan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_pelanggan' => 'required|string|max:35',
            'nomor_telp' => 'required|string|max:13',
            'email_pelanggan' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'alamat_pelanggan' => 'required|string',
            'foto_ktp' => 'required|image|mimes:jpg,png,jpeg|max:4096'
        ]);
        if ($request->hasFile('foto_ktp')) {
            $foto_ktp = $this->saveFile($request->name, $request->file('foto_ktp'));
        }
        $pelanggan = Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'foto_ktp_pelanggan' => $foto_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp_pelanggan' => $request->nomor_telp,
            'email' => $request->email_pelanggan,
        ]);
        return redirect()->route('pelanggan.index')->with(['success' => 'Data pelanggan berhasil ditambahkan!']);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'nama_pelanggan' => 'required|string|max:35',
            'nomor_telp' => 'required|string|max:13',
            'email_pelanggan' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'alamat_pelanggan' => 'required|string',
            'foto_ktp' => 'nullable|image|mimes:jpg,png,jpeg|max:4096'
        ]);
        $pelanggan = Pelanggan::findOrFail($request->id);
        if ($request->hasFile('foto_ktp')) {
            $file = 'uploads/pelanggan/' . $pelanggan->foto_ktp_pelanggan;
            $delete = File::delete($file);
            $foto_ktp = $this->saveFile($request->name, $request->file('foto_ktp'));
        } else {
            $foto_ktp = $pelanggan->foto_ktp_pelanggan;
        }
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat_pelanggan' => $request->alamat_pelanggan,
            'foto_ktp_pelanggan' => $foto_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telp_pelanggan' => $request->nomor_telp,
            'email' => $request->email_pelanggan,
        ]);
        return redirect()->route('pelanggan.index')->with(['success' => 'Data pelanggan berhasil diubah']);
    }

    public function destroy(Request $request)
    {
        $pelanggan = Pelanggan::findOrFail($request->id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with(['success' => 'Data pelanggan berhasil dihapus!']);
    }

    private function saveFile($name, $photo)
    {
        // $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();

        $path = public_path('uploads/pelanggan');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        Image::make($photo)->resize(300, 300)->save($path . '/' . $images);
        return $images;
    }
}
