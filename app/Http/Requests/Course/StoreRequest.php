<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => [
                'required',
                'string',
                'unique:App\Models\Course,name'
            ]
        ];
    }
    public function messages()
    {
        return [
            'required' => ' :attribute bắt bược phải điền',
            'unique' => ' :attribute đã được sử dụng',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'tên',
        ];
    }
}