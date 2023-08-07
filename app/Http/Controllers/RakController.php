<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use App\Http\Requests\StoreRakRequest;
use App\Http\Requests\UpdateRakRequest;

class RakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.rakBuku.index', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Data Rak',
            'raks' => Rak::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.rakBuku.create', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Data Rak',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRakRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRakRequest $request)
    {
        $validatedData = $request->validated();

        Rak::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Rak telah ditambahkan.');

        return redirect('/dashboard/data-rak');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function edit(Rak $data_rak)
    {
        return view('dashboard.rakBuku.edit', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Data Rak',
            'detailrak' => $data_rak
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRakRequest  $request
     * @param  \App\Models\Rak  $rak
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRakRequest $request, Rak $data_rak)
    {
        $validatedData = $request->validated();

        if ($request->slug != $data_rak->slug) {
            $req = $request->validate([
                'slug' => 'required|unique:raks'
            ]);

            $validatedData['slug'] = $req['slug'];
        }

        Rak::where('id', $data_rak->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Rak telah diubah.');

        return redirect('/dashboard/data-rak');
    }
}
