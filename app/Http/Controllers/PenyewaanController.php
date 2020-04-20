<?php

namespace App\Http\Controllers;

use App\HargaSewa;
use App\Mobil;
use App\Pelanggan;
use App\Penyewaan;
use DateTime;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index()
    {
        $title = "Penyewaan";
        $mobil = Mobil::orderBy('created_at', 'ASC')->get();
        $pelanggan = Pelanggan::orderBy('nama_pelanggan', 'ASC')->get();
        $penyewaan = Penyewaan::orderBy('faktur', 'ASC')->get();
        return view('penyewaan.index', compact('title', 'mobil', 'pelanggan', 'penyewaan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'mobil_id' => 'required|string|numeric',
            'pelanggan_id' => 'required|string|numeric',
            'harga_sewa' => 'required|string|numeric',
            'tanggal_sewa' => 'required|date',
            'jumlah_mobil' => 'required|numeric|string',
            'lama_sewa' => 'required|string|numeric'
        ]);
        $faktur = $this->notis();
        $sewa = HargaSewa::select('tarif_sewa')->where('id', '=', $request->harga_sewa)->first();
        $subtotal = ($sewa->tarif_sewa * $request->lama_sewa) * $request->jumlah_mobil;
        $tanggal_kembali_seharusnya = date('Y-m-d', strtotime($request->lama_sewa . ' days', strtotime($request->tanggal_sewa)));
        $mobil = Mobil::findOrFail($request->mobil_id);
        $hasil = $mobil->unit_tersedia - intval($request->jumlah_mobil);
        if ($hasil < 0) {
            return redirect()->route('penyewaan.index')->with(['warning' => 'Jumlah mobil tidak cukup']);
        }
        $mobil->update([
            'unit_tersedia' => $hasil
        ]);
        $penyewaan = Penyewaan::create([
            'faktur' => $faktur,
            'mobil_id' => $request->mobil_id,
            'pelanggan_id' => $request->pelanggan_id,
            'harga_sewa_id' => $request->harga_sewa,
            'tanggal_sewa' => $request->tanggal_sewa,
            'jumlah_mobil' => $request->jumlah_mobil,
            'lama_sewa' => $request->lama_sewa,
            'tanggal_kembali_seharusnya' => $tanggal_kembali_seharusnya,
            'tanggal_kembali' => $request->tanggal_sewa,
            'denda' => 0,
            'total_harga' => 0,
            'status_sewa' => 0,
            'subtotal' => $subtotal
        ]);
        return redirect()->route('penyewaan.index')->with(['success' => 'Penyewaan berhasil ditambahkan!']);
    }

    public function show($id)
    {
        $title = "Detail Penyewaan";
        $penyewaan = Penyewaan::with('pelanggan', 'mobil', 'harga_sewa')->findOrFail($id);
        // dd($penyewaan);
        return view('penyewaan.detail', compact('title', 'penyewaan'));
    }

    public function sewakan(Request $request)
    {
        $penyewaan = Penyewaan::findOrFail($request->id);
        // dd($penyewaan);
        $penyewaan->update([
            'status_sewa' => 1
        ]);
        return redirect()->route('penyewaan.index')->with(['success' => 'Berhasil disewakan!']);
    }

    public function kembalikan(Request $request)
    {
        $mobil = Mobil::with('harga_sewa')->findOrFail($request->mobil_id);
        $tambah = $mobil->unit_tersedia + intval($request->jumlah_mobil);
        $mobil->update([
            'unit_tersedia' => $tambah
        ]);
        $penyewaan = Penyewaan::findOrFail($request->id);
        $date = new DateTime($request->tanggal_kembali_seharusnya);
        $now = new DateTime();
        $selisih = $date->diff($now);
        if ($selisih->d >= 1) {
            $denda = $selisih->d * ($request->tarif * 5 / 100);
        } else {
            $denda = $selisih->d * 0;
        }
        $penyewaan->update([
            'status_sewa' => 2,
            'denda' => $denda,
            'tanggal_kembali' => $now,
            'total_harga' => $penyewaan->subtotal + $denda
        ]);
        return redirect()->route('penyewaan.index')->with(['success' => 'Berhasil dikembalikan!']);
    }

    public function batalkan(Request $request)
    {
        // dd($request);
        $mobil = Mobil::findOrFail($request->mobil_id);
        $tambah = $mobil->unit_tersedia + intval($request->jumlah_mobil);
        $mobil->update([
            'unit_tersedia' => $tambah
        ]);
        $penyewaan = Penyewaan::findOrFail($request->id);
        // dd($penyewaan);
        $penyewaan->update([
            'status_sewa' => 3
        ]);
        return redirect()->route('penyewaan.index')->with(['success' => 'Berhasil dibatalkan!']);
    }

    public function invoice($id)
    {
        $title = "Cetak Invoice";
        $penyewaan = Penyewaan::with('pelanggan', 'mobil', 'harga_sewa')->findOrFail($id);
        // dd($penyewaan);
        return view('penyewaan.invoice', compact('penyewaan'));
    }

    private function notis()
    {
        $noUrutAkhir = Penyewaan::max('faktur');
        if ($noUrutAkhir) {
            $tanggal = date("Ymd");
            $tanggal2 = substr($tanggal, 2, 6);
            $akhir = substr($noUrutAkhir, 6, 3);
            $noBaru = $tanggal2 . "00" . ($akhir + 1);
        } else {
            $no = "001";
            $tanggal = date("Ymd");
            $tanggal2 = substr($tanggal, 2, 6);
            $noBaru = $tanggal2 . $no;
        }
        return $noBaru;
    }
}
