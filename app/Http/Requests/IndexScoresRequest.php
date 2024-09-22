<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexScoresRequest extends FormRequest
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
            'per_page' => ['sometimes', 'required', 'integer', 'min:1', 'max:50'],
            'page' => ['sometimes', 'required', 'integer', 'min:1'],
        ];
    }

    public function getPaginatedData(): array
    {
        return [
            $this->integer('page', 1),
            $this->integer('per_page', 10),
        ];
    }
}
