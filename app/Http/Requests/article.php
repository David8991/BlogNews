<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class article extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'creator' => 'Required|min:3|max:50',
            'title' => 'Required|min:10|max:100',
            'description' => 'Required|min:10|max:500',
            'content' => 'Required|min:100',
        ];
    }

    public function messages()
    {
        return [
            'creator.required' => "Поле \"Name Author\" должно быть заполнено",
            'creator.min' => "Поле \"Name Author\" должно содержать минимум 3 символов",
            'creator.max' => "Поле \"Name Author\" должно содержать не более 50 символов",
            'title.required' => "Поле \"Title\" должно быть заполнено",
            'title.min' => "Поле \"Title\" должно содержать минимум 10 символов",
            'title.max' => "Поле \"Title\" должно содержать не более 100 символов",
            'description.required' => "Поле \"Description\" должно быть заполнено",
            'description.min' => "Поле \"Description\" должно содержать минимум 10 символов",
            'description.max' => "Поле \"Description\" должно содержать не более 500 символов",
            'content.required' => "Поле \"Article\" должно быть заполнено",
            'content.min' => "Поле \"Article\" должно содержать минимум 100 символов",
        ];
    }
}
