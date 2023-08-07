<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBukuRequest extends FormRequest
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
            'judul' => 'required|max:255',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required|numeric|integer|digits:4',
            'isbn' => 'required|numeric|integer|digits:13|unique:bukus',
            'jumlah' => 'required|numeric',
            'rak_id' => 'required',
        ];
    }
}
