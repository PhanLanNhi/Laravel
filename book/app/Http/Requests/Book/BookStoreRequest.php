<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
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
            'nameBook' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'image' => [
                'required',
            ],
            'publishDate' => [
                'required',
            ],
            'authorId' => [
                'required',
                function ($attribute, $value, $message) {
                    if ($value === 'default') {
                        $message('This field must not be the default option.');
                    }
                },
            ],
        ];
    }

    public function messages()
    {
        return [
            'required'=> 'Please enter complete information',
        ];
    }
}
