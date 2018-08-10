<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigRequest extends FormRequest
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
            'address' => 'required|min:1',
            'description' => 'required|min:1',
            'email' => 'required|min:1',
            'favicon' => 'image|nullable',
            'keyword' => 'required|min:1',
            'logo' => 'image|nullable',
            'phone' => 'required|min:1',
            'title' => 'required|min:1'
        ];
    }
}
