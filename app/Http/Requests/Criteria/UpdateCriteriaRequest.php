<?php

namespace App\Http\Requests\Criteria;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCriteriaRequest extends FormRequest
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
            'baris' => ['required', 'in:harga,jarak,fasilitas,luas'],
            'nilai' => ['required', 'numeric', 'between:1,9'],
            'kolom' => ['required', 'in:harga,jarak,fasilitas,luas']
        ];
    }
}
