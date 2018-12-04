<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'upc' => 'required|unique:products|digits_between:10,12|numeric',
            'case_count' => 'required|numeric|min:0',
            'name' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'size' => 'required',
            'file' => 'required',
        ];
    }
}
