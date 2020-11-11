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
            'nip' => 'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'no_hp' => 'nullable',
            'nidn' => 'nullable',
            'input_surat' => 'nullable',
            'id_unit_kerja' => 'required',
            // 'foto_profil' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'nip.required' => 'NIP/NIK wajib diisi',
            'nama.required' => 'Nama user wajib diisi',
            'jenis_kelamin.required' => 'Pilih jenis kelamin',
            'id_unit_kerja.required' => 'Pilih unit kerja',
        ];
    }
}
