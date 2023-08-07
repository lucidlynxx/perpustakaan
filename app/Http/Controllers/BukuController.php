<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\StoreBukuRequest;
use App\Http\Requests\UpdateBukuRequest;
use App\Models\Rak;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.buku.index', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Data Buku',
            'bukus' => Buku::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.buku.create', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Data Buku',
            'raks' => Rak::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBukuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBukuRequest $request)
    {
        $validatedData = $request->validated();

        Buku::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Buku telah ditambahkan.');

        return redirect('/dashboard/data-buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $data_buku)
    {
        return view('dashboard.buku.show', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Detail Data Buku',
            'detailbuku' => $data_buku
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $data_buku)
    {
        return view('dashboard.buku.edit', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Data Buku',
            'raks' => Rak::get(),
            'detailbuku' => $data_buku
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBukuRequest  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBukuRequest $request, Buku $data_buku)
    {
        $validatedData = $request->validated();

        if ($request->slug != $data_buku->slug) {
            $req = $request->validate([
                'slug' => 'required|unique:bukus'
            ]);

            $validatedData['slug'] = $req['slug'];
        }

        if ($request->isbn != $data_buku->isbn) {
            $req = $request->validate([
                'isbn' => 'required|numeric|integer|digits:13|unique:bukus'
            ]);

            $validatedData['isbn'] = $req['isbn'];
        }

        Buku::where('id', $data_buku->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Buku telah diubah.');

        return redirect('/dashboard/data-buku');
    }
}
