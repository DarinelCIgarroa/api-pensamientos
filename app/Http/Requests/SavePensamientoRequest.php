<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePensamientoRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|min:5',
            'description' => 'required|max:100|min:5',
            'user_id' => 'required|exists:App\Models\User,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'El titulo es requerido',
            'title.max' => 'El titutlo no puede tener mas de 255 caracteres',
            'description.required' => 'El campo descripción es obligatorio',
            'description.max' => 'La descripción no puede tener mas de 255 caracteres',
    ];
}
}
