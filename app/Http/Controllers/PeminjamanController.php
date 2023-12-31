<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Http\Requests\StorePeminjamanRequest;
use App\Models\Buku;
use App\Models\Siswa;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.peminjaman.index', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Data Peminjaman',
            'peminjamen' => Peminjaman::latest()->get(),
            'current' => Carbon::today()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.peminjaman.create', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Data Peminjaman',
            'bukus' => Buku::get(),
            'siswas' => Siswa::get(),
            'current' => Carbon::today()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeminjamanRequest $request)
    {
        $jumlahBuku = Buku::find($request->buku_id);

        if ($jumlahBuku->jumlah == 0) {
            alert()->error('Oops...', 'Buku Habis!');
            return redirect('/dashboard/data-peminjaman/create');
        }

        $jumlahBuku->jumlah = $jumlahBuku->jumlah - 1;
        $jumlahBuku->save();

        $validatedData = $request->validated();

        $validatedData['slug'] = $request->slug;

        Peminjaman::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Peminjaman telah ditambahkan.');

        return redirect('/dashboard/data-peminjaman');
    }

    public function menyerahkan(Peminjaman $peminjaman)
    {
        $jumlahBuku = Buku::find($peminjaman->buku_id);

        $jumlahBuku->jumlah = $jumlahBuku->jumlah + 1;
        $jumlahBuku->save();

        $peminjaman->status = 'kembali';
        $peminjaman->save();

        alert()->success('Buat Data Sukses!', 'Buku telah diserahkan.');

        return redirect('/dashboard/data-peminjaman');
    }

    public function perpanjang(Peminjaman $peminjaman)
    {
        $current = Carbon::today();

        $peminjaman->tglKembali = $current->addDays(3)->format('Y-m-d');
        $peminjaman->save();

        alert()->success('Buat Data Sukses!', 'Peminjaman buku telah diperpanjang.');

        return redirect('/dashboard/data-peminjaman');
    }
}
