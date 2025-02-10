<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'min:1', 'max:255'],
            'description' => ['sometimes', 'string', 'min:1', 'max:255'],
            'author' => ['sometimes', 'string', 'min:1', 'max:255'],
            'genre' => ['sometimes', 'string', 'min:1', 'max:255'],
            'year_of_publication' => ['sometimes', 'integer', 'min:1400', 'max:'.date('Y')],
        ];
    }
}
