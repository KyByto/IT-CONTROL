<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Le nom de l\'hôtel est obligatoire.',
            'name.string' => 'Le nom de l\'hôtel doit être une chaîne de caractères.',
            'name.max' => 'Le nom de l\'hôtel ne peut pas dépasser 255 caractères.',
            'location.required' => 'L\'emplacement est obligatoire.',
            'location.string' => 'L\'emplacement doit être une chaîne de caractères.',
            'location.max' => 'L\'emplacement ne peut pas dépasser 255 caractères.',
        ];
    }
}
