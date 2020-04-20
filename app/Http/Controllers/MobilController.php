<?php

namespace App\Http\Controllers;

use App\Merek;
use App\Mobil;
use Illuminate\Http\Request;
use File;
use Image;

class MobilController extends Controller
{
    public function index()
    {
        $title = 'Data Mobil';
        $merek = Merek::orderBy('merek', 'ASC')->get();
        $mobil = Mobil::orderBy('created_at')->get();
        return view('mobil.index', compact('title', 'merek', 'mobil'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'merek_id' => 'required|string|numeric',
            'varian' => 'required|string|max:35',
            'tahun_keluaran' => 'required|string|numeric',
            'kode_mobil' => 'required|string|max:35',
            'plat_nomor' => 'required|string|max:10',
            'harga' => 'required|string|numeric',
            'jumlah_unit' => 'required|string|numeric',
            'foto_mobil' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        if ($request->hasFile('foto_mobil')) {
            $foto_mobil = $this->saveFile($request->name, $request->file('foto_mobil'));
        }
        $mobil = Mobil::firstOrCreate([
            'kode_mobil' => $request->kode_mobil
        ], [
            'merek_id' => $request->merek_id,
            'varian' => $request->varian,
            'tahun_keluaran' => $request->tahun_keluaran,
            'plat_nomor' => $request->plat_nomor,
            'harga_mobil' => $request->harga,
            'foto_mobil' => $foto_mobil,
            'jumlah_unit' => $request->jumlah_unit,
            'unit_tersedia' => $request->jumlah_unit,
        ]);

        return redirect()->route('mobil.index')->with(['success' => 'Data mobil berhasil ditambahkan!']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'merek_id' => 'required|string|numeric',
            'varian' => 'required|string|max:35',
            'tahun_keluaran' => 'required|string|numeric',
            'kode_mobil' => 'required|string|max:35',
            'plat_nomor' => 'required|string|max:10',
            'harga' => 'required|string|numeric',
            'jumlah_unit' => 'required|string|numeric',
            'foto_mobil' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);
        $mobil = Mobil::findOrFail($request->id);
        if ($request->hasFile('foto_mobil')) {
            $file = 'uploads/mobil/' . $mobil->foto_mobil;
            $delete = File::delete($file);
            $foto_mobil = $this->saveFile($request->name, $request->file('foto_mobil'));
        } else {
            $foto_mobil = $mobil->foto_mobil;
        }
        $mobil->update([
            'kode_mobil' => $request->kode_mobil,
            'merek_id' => $request->merek_id,
            'varian' => $request->varian,
            'tahun_keluaran' => $request->tahun_keluaran,
            'plat_nomor' => $request->plat_nomor,
            'harga_mobil' => $request->harga,
            'foto_mobil' => $foto_mobil,
            'jumlah_unit' => $request->jumlah_unit,
        ]);
        return redirect()->route('mobil.index')->with(['success' => 'Data mobil berhasil diubah!']);
    }

    public function destroy(Request $request)
    {
        $mobil = Mobil::findOrFail($request->id);
        $mobil->delete();
        return redirect()->route('mobil.index')->with(['success' => 'Data mobil berhasil dihapus!']);
    }

    private function saveFile($name, $photo)
    {
        // $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        $images = str_slug($name) . time() . '.' . $photo->getClientOriginalExtension();

        $path = public_path('uploads/mobil');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        Image::make($photo)->resize(300, 300)->save($path . '/' . $images);
        return $images;
    }

    public function merek_mobil()
    {
        $title = 'Merek Mobil';
        $merek = Merek::orderBy('merek', 'ASC')->get();
        return view('mobil.merek_mobil.index', compact('title', 'merek'));
    }

    public function store_merek(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'merek_mobil' => 'required|string|max:20',
        ]);

        $merek = Merek::firstOrCreate([
            'merek' => $request->merek_mobil
        ]);
        return redirect()->route('mobil.merek_mobil')->with(['success' => 'Merek mobil berhasil ditambahkan!']);
    }

    public function destroy_merek(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|string'
        ]);
        $merek = Merek::findOrFail($request->id);
        $merek->delete();
        return redirect()->route('mobil.merek_mobil')->with(['success' => 'Merek mobil berhasil dihapus!']);
    }
}
