<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'mobile' => 'required|regex:/^09[0-9]{9}$/',
            'meta.1' => 'required|regex:/^\d{10}$/',
            'meta.2' => 'required',
            'meta.3' => 'nullable',
            'meta.4' => 'nullable',
            'meta.5' => 'nullable|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        ];
    }
}
