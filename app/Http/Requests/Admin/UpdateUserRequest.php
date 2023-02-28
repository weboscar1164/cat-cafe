<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Current;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
            'current_password' => new Current(),
            'new_password' => ['string', 'min:8', 'confirmed', 'nullable'],
            'image' => [
                'file',
                'image',
                'max:2000',
                'mimes:jpeg,jpg,png',
                'dimensions:min_width=100,min_height=100,max_width=300,max_height=300',
            ],
            'introduction' => ['string', 'max:255'],
        ];
    }

    //属性名の翻訳
    public function attributes()
    {
        return [
            'introduction' => '自己紹介文'
        ];
    }
}