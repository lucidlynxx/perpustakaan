<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Buku;
use App\Models\Rak;
use App\Models\Peminjaman;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index()
    {
        return view('dashboard.laporan.index', [
            'title' => 'Laporan',
            'author' => 'Firman Adi Pratama',
        ]);
    }

    public function printSiswa()
    {
        $dataSiswa = Siswa::latest()->get();

        $pdf = PDF::loadview('dashboard.laporan.printSiswa', ['siswas' => $dataSiswa])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function printUser()
    {
        $dataUser = User::latest()->get();

        $pdf = PDF::loadview('dashboard.laporan.printUser', ['users' => $dataUser])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function printBuku()
    {
        $dataBuku = Buku::latest()->get();

        $pdf = PDF::loadview('dashboard.laporan.printBuku', ['bukus' => $dataBuku])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function printRak()
    {
        $dataRak = Rak::latest()->get();

        $pdf = PDF::loadview('dashboard.laporan.printRak', ['raks' => $dataRak])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function printPeminjaman()
    {
        $dataPeminjaman = Peminjaman::latest()->get();
        $current = Carbon::today();

        $pdf = PDF::loadview('dashboard.laporan.printPeminjaman', [
            'peminjamans' => $dataPeminjaman,
            'current' => $current
        ])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function pinjam()
    {
        $dataPinjam = Peminjaman::all()->where('status', 'pinjam');
        $current = Carbon::today();

        $pdf = PDF::loadview('dashboard.laporan.printPinjam', [
            'pinjams' => $dataPinjam,
            'current' => $current
        ])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }

    public function kembali()
    {
        $dataKembali = Peminjaman::all()->where('status', 'kembali');
        $current = Carbon::today();

        $pdf = PDF::loadview('dashboard.laporan.printKembali', [
            'kembalis' => $dataKembali,
            'current' => $current
        ])->setPaper('a4', 'landscape');

        return $pdf->stream();
    }
}
