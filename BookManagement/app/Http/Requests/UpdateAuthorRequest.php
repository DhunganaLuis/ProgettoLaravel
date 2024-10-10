<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
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
            'name' => 'required|string',
            'birthday'=>'date_format:Y-m-d|date',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Inserisci il nome',
            'name.string' => 'Inserisci il nome',
            'birthday.date'=> 'Inserisci una data di nascita',
            'birthday.date_format'=> 'Formato data non valido',
        ];
    }
}
