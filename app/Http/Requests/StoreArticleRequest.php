<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
        //Creo le regole di validazione per i campi del form di aggiunta articolo
        return [
            'titolo' => 'required|max:100',
            'contenuto' => 'required'
        ];
    }

    //Personalizzo i messaggi di errore
    public function messages () {

        return [
            'titolo.required' => 'Il campo titolo è obbligatorio',
            'titolo.max' => 'La lunghezza massima del testo è di 100 caratteri',
            'contenuto.required' => 'Il campo contenuto è obbligatorio'
        ];

    }
}
