<?php

namespace App\Http\Requests\Course;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DestroyRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'course' => [
                'required',
                Rule::exists(Course::class, 'id')
            ],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'course' => $this->route('course')
        ]);
    }

    public function messages()
    {
        return [
            'required' => ' :attribute bắt bược phải điền',
            'exists' => ' :attribute không tồn tại',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'tên',
        ];
    }
}