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
                'file' => 'required|mimes:pdf,docx,dox',
                'nama_surat' => 'required',
                'no_surat' => [
                    'required',
                    Rule::unique('documents', 'no_surat')->ignore($this->id)
                ],
                'penandatangan' => 'required',
                'ditetapkan' => 'required',
            ];
        } else {
            return [
                'file' => 'required|mimes:pdf,docx,dox',
                'nama_surat' => 'required',
                'no_surat' => 'required|unique:documents',
                'penandatangan' => 'required',
                'ditetapkan' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'file.required' => 'File wajib diisi',
            'mimes.required' => 'Format file wajib pdf, docx,doc',
            'nama_surat.required' => 'Nama surat wajib diisi',
            'no_surat.required' => 'Nomor surat wajib diisi',
            'no_surat.unique' => 'Nomor surat sudah ada',
            'penandatangan.required' => 'Penandatangan wajib diisi',
            'ditetapkan.required' => 'Form ini wajib diisi',
        ];
    }
}