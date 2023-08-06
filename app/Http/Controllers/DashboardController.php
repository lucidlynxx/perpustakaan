<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Siswa;

class DashboardController extends Controller
{
    public function index()
    {
        $dataPeminjaman = Peminjaman::all();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'author' => 'Firman Adi Pratama',
            'siswas' => Siswa::all()->count(),
            'bukus' => Buku::all()->sum('jumlah'),
            'pinjams' => $dataPeminjaman->where('status', 'pinjam')->count(),
            'kembalis' => $dataPeminjaman->where('status', 'kembali')->count()
        ]);
    }
}
