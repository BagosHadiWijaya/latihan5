<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Terapis;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelanggan = User::where('role', 'pelanggan')->count();
        $totalTerapis = Terapis::count();
        $totalPesanan = Pesanan::count();
        return view('pages.dashboard.index', compact('totalPelanggan', 'totalTerapis', 'totalPesanan'));
    }
}
