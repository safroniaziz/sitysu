<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required',
            'nip' => 'required',
            'jk' => 'nullable',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'foto_profil' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama user wajib diisi',
            'nip.required' => 'NIP/NIDN wajib diisi',
        ];
    }
}
