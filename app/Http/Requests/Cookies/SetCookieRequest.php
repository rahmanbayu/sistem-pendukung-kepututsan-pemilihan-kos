<?php

namespace App\Http\Requests\Cookies;

use Illuminate\Foundation\Http\FormRequest;

class SetCookieRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'harga' => ['required', 'numeric'],
            'jarak' => ['required', 'numeric'],
            'fasilitas' => ['required', 'in:0,1-2,3-4,5-6,>6'],
            'luas' => ['required', 'in:3x3,4x4,5x5,6x6,7x7']
        ];
    }
}
