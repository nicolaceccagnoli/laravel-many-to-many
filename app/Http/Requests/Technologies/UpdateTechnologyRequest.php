<?php

namespace App\Http\Requests\Technologies;

use Illuminate\Foundation\Http\FormRequest;

// Helpers
use Illuminate\Support\Facades\Auth;

class UpdateTechnologyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|max:64',
            'slug'=> 'nullable|max:64',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Inserisci un Titolo per la Tecnologia',
        ];
    }

}
