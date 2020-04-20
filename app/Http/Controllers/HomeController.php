<?php

namespace App\Http\Controllers;

use App\Penyewaan;
use DateTime;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Dashboard";
        $tanggal = date('m');
        $pendapatan = Penyewaan::where('status_sewa', '=', 2)->whereMonth('created_at', '=', $tanggal)->sum('total_harga');
        $sewa = Penyewaan::where('status_sewa', '=', 2)->count();
        $booking = Penyewaan::where('status_sewa', '=', 1)->count();
        $batal = Penyewaan::where('status_sewa', '=', 3)->count();
        return view('dashboard.admin', compact('title', 'pendapatan', 'sewa', 'booking', 'batal'));
    }
}
