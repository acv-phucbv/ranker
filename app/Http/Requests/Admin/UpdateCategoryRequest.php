<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->role == \App\Models\User::ROLE_ADMIN;
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
                'string',
                'max:31',
                Rule::unique('categories')->ignore($this->category->id)
            ],
            'slug' => [
                'nullable',
                'string',
                'max:31',
                Rule::unique('categories')->ignore($this->category->id)
            ],
            'description' => 'nullable|string|max:255',
        ];
    }
}
