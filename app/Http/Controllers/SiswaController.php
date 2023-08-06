<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
        $request->slug = SlugService::createSlug(Siswa::class, 'slug', $request->nama);

        $validatedData = $request->validate([
            'nisn' => 'required|numeric|integer|digits:10|unique:siswas',
            'nama' => 'required|max:255',
            'kelas' => 'required',
            'tglLahir' => 'required',
            'alamat' => 'required',
            'jenisKelamin' => 'required',
        ]);

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
        $rules = [
            'nama' => 'required|max:255',
            'kelas' => 'required',
            'tglLahir' => 'required',
            'alamat' => 'required',
            'jenisKelamin' => 'required',
        ];

        if ($request->slug != $data_siswa->slug) {
            $rules['slug'] = 'required|unique:siswas';
        }

        if ($request->nisn != $data_siswa->nisn) {
            $rules['nisn'] = 'required|min:10|unique:siswas';
        }

        $validatedData = $request->validate($rules);

        Siswa::where('id', $data_siswa->id)->update($validatedData);

        alert()->success('Ubah Data Sukses!', 'Data Siswa telah diubah.');

        return redirect('/dashboard/data-siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siswa $siswa)
    {
        //
    }
}
