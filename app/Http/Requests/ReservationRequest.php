<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'hotel_id' => ['required', 'exists:hotels,id'],
            'check_in' => ['required', 'date', 'after_or_equal:today'],
            'check_out' => ['required', 'date', 'after:check_in'],
        ];
    }

    public function messages(): array
    {
        return [
            'hotel_id.required' => 'Le champ hôtel est obligatoire.',
            'hotel_id.exists' => 'L\'hôtel sélectionné est invalide.',
            'check_in.required' => 'La date d\'arrivée est obligatoire.',
            'check_in.date' => 'La date d\'arrivée doit être une date valide.',
            'check_in.after_or_equal' => 'La date d\'arrivée doit être aujourd\'hui ou plus tard.',
            'check_out.required' => 'La date de départ est obligatoire.',
            'check_out.date' => 'La date de départ doit être une date valide.',
            'check_out.after' => 'La date de départ doit être après la date d\'arrivée.',
        ];
    }
}
