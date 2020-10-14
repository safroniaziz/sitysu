<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nip_nidn' => 'required',
            'role' => 'required',
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
            'nip_nidn.required' => 'NIP/NIDN wajib diisi',
            'role.required' => 'Hak akses wajib diisi',
        ];
    }
}
