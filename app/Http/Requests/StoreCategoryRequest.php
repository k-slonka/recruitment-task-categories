<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => [
                'required',
                'max:255'
            ],
            'locale' => [
                'required',
                'in:PL,EN,DE,FR'
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Category name is required.',
            'name.max' => 'The category name cannot exceed 255 characters.',
            'locale.required' => 'Category language is required.',
            'locale.in' => 'The product language must have value PL,EN,DE or FR.',
        ];
    }
}
