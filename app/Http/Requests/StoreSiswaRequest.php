<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSiswaRequest extends FormRequest
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
            'nisn' => 'required|numeric|integer|digits:10|unique:siswas',
            'nama' => 'required|max:255',
            'kelas' => 'required',
            'tglLahir' => 'required',
            'alamat' => 'required',
            'jenisKelamin' => 'required',
        ];
    }
}
