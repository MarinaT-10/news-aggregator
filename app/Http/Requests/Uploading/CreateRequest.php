<?php

declare(strict_types=1);

namespace App\Http\Requests\Uploading;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'author' => ['nullable', 'string', 'min:2', 'max:30'],
            'email' => ['required','email'],
            'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'message' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'message' => '"заявка"'
        ];
    }

    public function messages(): array
    {
        return [
            'message.required' => 'Обязательно опишите, что Вы хотите получить в поле :attribute',
        ];
    }
}
