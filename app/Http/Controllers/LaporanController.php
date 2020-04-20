<?php

namespace App\Http\Controllers;

use App\Penyewaan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $title = "Laporan";
        return view('laporan.index', compact('title'));
    }

    public function show(Request $request)
    {
        $penyewaan = Penyewaan::with('mobil', 'mobil.merek')->whereBetween('created_at', [$request->dari, $request->ke])->where('status_sewa', '=', 2)->get();
        // dd($penyewaan);
        $dari = $request->dari;
        $ke = $request->ke;
        return view('laporan.laporan', compact('penyewaan', 'dari', 'ke'));
    }
}
