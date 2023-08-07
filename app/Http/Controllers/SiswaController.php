<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.siswa.index', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Data Siswa',
            'siswas' => Siswa::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.siswa.create', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Data Siswa',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiswaRequest $request)
    {
        $validatedData = $request->validated();

        Siswa::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Siswa telah ditambahkan.');

        return redirect('/dashboard/data-siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show(Siswa $data_siswa)
    {
        return view('dashboard.siswa.show', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Detail Data Siswa',
            'detailsiswa' => $data_siswa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $data_siswa)
    {
        return view('dashboard.siswa.edit', [
            'author' => 'Firman Adi Pratama',
            'title' => 'Detail Data Siswa',
            'detailsiswa' => $data_siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSiswaRequest  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiswaRequest $request, Siswa $data_siswa)
    {
        $validatedData = $request->validated();

        if ($request->slug != $data_siswa->slug) {
            $req = $request->validate([
                'slug' => 'required|unique:siswas'
            ]);

            $validatedData['slug'] = $req['slug'];
        }

        if ($request->nisn != $data_siswa->nisn) {
            $req = $request->validate([
                'nisn' => 'required|min:10|unique:siswas'
            ]);

            $validatedData['nisn'] = $req['nisn'];
        }

        Siswa::where('id', $data_siswa->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Siswa telah diubah.');

        return redirect('/dashboard/data-siswa');
    }
}
