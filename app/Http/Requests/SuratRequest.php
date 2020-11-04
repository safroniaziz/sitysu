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
        if ($this->id) {
            return [
                'link_file' => 'required|mimes:pdf,docx,dox',
                'no_surat' => [
                    'required',
                    Rule::unique('surat', 'no_surat')->ignore($this->id, 'id_surat')
                ],
                'tentang' => 'required',
                'jenis_surat' => 'required',
                'tanggal_surat' => 'required',
                'pejabat' => 'nullable',
                'jabatan_pejabat' => 'nullable',
                'tanggal_mulai' => 'nullable',
                'tanggal_akhir' => 'nullable',
                'deskripsi_surat' => 'nullable',
            ];
        } else {
            return [
                'link_file' => 'required|mimes:pdf,docx,dox',
                'no_surat' => 'required|unique:surat',
                'tentang' => 'required',
                'jenis_surat' => 'required',
                'tanggal_surat' => 'required',
                'pejabat' => 'nullable',
                'jabatan_pejabat' => 'nullable',
                'tanggal_mulai' => 'nullable',
                'tanggal_akhir' => 'nullable',
                'deskripsi_surat' => 'nullable',
            ];
        }
    }

    public function messages()
    {
        return [
            'link_file.required' => 'File wajib diisi',
            'link_file.mimes' => 'Format file wajib pdf, docx,doc',
            'no_surat.required' => 'Nomor surat wajib diisi',
            'no_surat.unique' => 'Nomor surat sudah ada',
            'tentang.required' => 'Tentang surat wajib diisi',
            'jenis_surat.required' => 'Jenis surat wajib diisi',
            'tanggal_surat.required' => 'Form ini wajib diisi',
        ];
    }
}
