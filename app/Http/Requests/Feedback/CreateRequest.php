<?php

declare(strict_types=1);

namespace App\Http\Requests\Feedback;

use App\Enums\FeedbackStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'status' => [new Enum(FeedbackStatus::class)],
            'message' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'message' => '"комментарий/отзыв"'
        ];
    }

}
