<?php

namespace Helori\LaravelAdmin\Requests;

use Illuminate\Foundation\Http\FormRequest;


class Admin extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Le nom est requis",
            'email.required' => "L'email est requis",
            'email.email' => "L'email n'a pas un format correct",
            //'password.required' => "Le mot de passe est requis",
            'password.min' => "Le mot de passe doit comporter au moins 6 caractères",
        ];
    }
}
