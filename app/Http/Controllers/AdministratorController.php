<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministratorController extends Controller
{
    public function index()
    {
        return view('dashboard.administrator.index', [
            'title' => 'Data Administrator',
            'author' => 'Firman Adi Pratama',
            'administrators' => User::latest()->get()
        ]);
    }

    public function create()
    {
        return view('dashboard.administrator.create', [
            'title' => 'Data Administrator',
            'author' => 'Firman Adi Pratama',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users',
            'password' => 'required|min:8|max:255',
            'alamat' => 'required',
            'noTelepon' => 'required|numeric|digits:12',
            'jenisKelamin' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        alert()->success('Buat Data Sukses!', 'Data Administrator telah ditambahkan.');

        return redirect('/dashboard/data-administrator');
    }
}
