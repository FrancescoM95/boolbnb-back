<?php

namespace App\Http\Requests\Apartment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApartmentRequest extends FormRequest
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
            'title' => 'required|string|min:3|max:255',
            'baths' => 'required|numeric|min:1|',
            'beds' => 'required|numeric|min:1|',
            'rooms' => 'required|numeric|min:1|',
            'square_meters' => 'required|numeric|min:5|',
            'address' => 'required|string',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
            'cover_image' => 'nullable|mimes:jpeg,png,jpg',
            'is_visible' => 'nullable',
            'user_id' => 'nullable',
        ];

        return [

            // Validazione Titolo
            'title.required' => 'Il titolo è obbligatorio',
            'title.min' => 'Il titolo deve avere minimo :min caratteri',
            'title.max' => 'Il titolo deve avere minimo :max caratteri',

            // Validazione bagni
            'baths.required' => 'Numero di bagni obbligatorio',
            'baths.numeric' => 'Inserisci un numero',
            'baths.min' => 'Il numero di bagni non può essere 0',

            // Validazione letti
            'beds.required' => 'Numero di letti obbligatorio',
            'beds.numeric' => 'Inserisci un numero',
            'beds.min' => 'Il numero di letti non può essere 0',

            // Validazione stanze
            'rooms.required' => 'Numero di stanze obbligatorio',
            'rooms.numeric' => 'Inserisci un numero',
            'rooms.min' => 'Il numero di stanze non può essere 0',

            // Validazione metri quadri
            'square_meters.required' => 'Numero di metri quadri obbligatorio',
            'square_meters.numeric' => 'Inserisci un numero',
            'square_meters.min' => 'Il numero di metri quadri non può essere 0',

            //Validazione campi restanti
            'address.required' => 'Indirizzo obbligatorio',
            'cover_image.mimes' => 'Il file deve essere di tipo .jpg .jpeg .png',
        ];
    }
}
