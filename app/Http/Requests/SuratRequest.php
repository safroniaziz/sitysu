<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SuratRequest extends FormRequest
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
        if ($this->id_surat) {
            return [
                'link_file' => 'required',
                'no_surat' => [
                    'required',
                    Rule::unique('surat', 'no_surat')->ignore($this->id_surat, 'id_surat')
                ],
                'tentang' => 'required',
                'jenis_surat' => 'required',
                'tanggal_surat' => 'required',
                'pejabat' => 'nullable',
                'jabatan_pejabat' => 'nullable',
                'tanggal_mulai' => 'nullable',
                'tanggal_akhir' => 'nullable',
                'deskripsi_surat' => 'nullable',
                'penerima_surat' => 'required',
            ];
        } else {
            return [
                'link_file' => 'required',
                'no_surat' => 'required|unique:surat',
                'tentang' => 'required',
                'jenis_surat' => 'required',
                'tanggal_surat' => 'required',
                'pejabat' => 'nullable',
                'jabatan_pejabat' => 'nullable',
                'tanggal_mulai' => 'nullable',
                'tanggal_akhir' => 'nullable',
                'deskripsi_surat' => 'nullable',
                'penerima_surat' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'link_file.required' => 'Link file wajib diisi',
            'no_surat.required' => 'Nomor surat wajib diisi',
            'no_surat.unique' => 'Nomor surat sudah ada',
            'tentang.required' => 'Tentang surat wajib diisi',
            'jenis_surat.required' => 'Jenis surat wajib diisi',
            'tanggal_surat.required' => 'Form ini wajib diisi',
            'penerima_surat.required' => 'Penerima surat wajib diisi',
        ];
    }
}
