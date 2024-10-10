<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'string|nullable|max:800',
            'pages' => 'integer|nullable',
            'author_id' => 'integer|required',
            'category_id' => 'integer|required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio.',
            'title.string' => 'Il titolo deve essere una stringa.',
            'title.max' => 'Il titolo non può superare i 255 caratteri.',

            'description.string' => 'La descrizione deve essere una stringa.',
            'description.max' => 'La descrizione non può superare gli 800 caratteri.',

            'pages.integer' => 'Le pagine devono essere un numero intero.',

            'author_id.required' => 'L\'autore è obbligatorio.',
            'author_id.integer' => 'L\'ID autore deve essere un numero intero.',

            'category_id.required' => 'La categoria è obbligatoria.',
            'category_id.integer' => 'L\'ID categoria deve essere un numero intero.',
        ];
    }
}
