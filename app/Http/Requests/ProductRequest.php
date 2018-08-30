<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'price' => 'numeric|min:1000|max:9999999999|required',
            'detail' => 'min:10|required',
            'category_id' => 'required',
            'thumbnail' => 'image|nullable',
            'province_id' => 'required|exists:provinces,id',
            'quantity' => 'numeric|min:1|max:1000|required'
        ];
    }
}
