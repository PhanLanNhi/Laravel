<?php

namespace App\Http\Requests\Author;

use Illuminate\Foundation\Http\FormRequest;

class AuthorStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // luôn nhớ là true
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nameAuthor' => [
                'required',
            ],
            'birthDay' => [
                'required',
            ],
            'gender' => [
                'required',
                function ($attribute, $value, $fail) {
                    if($value == 'default') {
                        $fail('This field must not be the default option.');
                    }
                }
            ]
        ];
    }

    public function messages()
    {
        return [
            'required'=> 'Please enter complete information',
        ];
    }
}
