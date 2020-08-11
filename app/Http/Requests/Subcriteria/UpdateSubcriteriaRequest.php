<?php

namespace App\Http\Requests\Subcriteria;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubcriteriaRequest extends FormRequest
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
            'sbaik_baik' => ['required', 'numeric', 'between:1,9'],
            'sbaik_sedang' => ['required', 'numeric', 'between:1,9'],
            'sbaik_kurang' => ['required', 'numeric', 'between:1,9'],
            'sbaik_skurang' => ['required', 'numeric', 'between:1,9'],
            'baik_sedang' => ['required', 'numeric', 'between:1,9'],
            'baik_kurang' => ['required', 'numeric', 'between:1,9'],
            'baik_skurang' => ['required', 'numeric', 'between:1,9'],
            'sedang_kurang' => ['required', 'numeric', 'between:1,9'],
            'sedang_skurang' => ['required', 'numeric', 'between:1,9'],
            'kurang_skurang' => ['required', 'numeric', 'between:1,9'],
        ];
    }
}
