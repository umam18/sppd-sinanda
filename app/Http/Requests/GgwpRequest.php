<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GgwpRequest extends Request
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
            'pejabat' => 'required',
            'nama' => 'required',
            'nip' => 'required'
            'pangkat' => 'required',
            'jabatan' => 'required',
            'biaya' => 'required'
            'maksud' => 'required',
            'berangkat' => 'required',
            'tujuan1' => 'required'
            'tujuan2' => 'required',
            'transportasi' => 'required',
            'tanggal_berangkat' => 'required'
            'tanggal_kembali' => 'required',
            'pengikut' => 'required',
            'pembebanan' => 'required'
            'ket' => 'required'
        ];
    }
}
