<?php

namespace App\Http\Controllers;

use App\HargaSewa;
use App\Mobil;
use App\Pelanggan;
use Illuminate\Http\Request;

class HargaSewaController extends Controller
{
    public function index()
    {
        $title = "Harga Sewa";
        $mobil = Mobil::orderBy('created_at')->get();
        $harga = HargaSewa::orderBy('created_at')->get();
        return view('harga_sewa.index', compact('title', 'mobil', 'harga'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'mobil_id' => 'required|string|numeric',
            'tarif_sewa' => 'required|string|numeric',
            'keterangan' => 'required|string',
        ]);
        $harga = HargaSewa::create([
            'mobil_id' => $request->mobil_id,
            'keterangan' => $request->keterangan,
            'tarif_sewa' => $request->tarif_sewa
        ]);
        return redirect()->route('harga_sewa.index')->with(['success' => 'Harga Sewa berhasil ditambahkan!']);
    }

    public function fetch($id)
    {
        $harga = HargaSewa::with('mobil')->where('mobil_id', '=', $id)->get();
        return response()->json($harga, 200);
    }

    public function get_unit($id)
    {
        $unit = Mobil::select('unit_tersedia')->findOrFail($id);
        return response()->json($unit, 200);
    }
}
