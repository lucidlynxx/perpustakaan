<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeminjamanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'buku_id' => 'required|numeric|integer',
            'siswa_id' => 'required|numeric|integer',
            'tglPinjam' => 'required',
            'tglKembali' => 'required',
            'status' => 'required',
            'terlambat' => 'required',
        ];
    }
}
