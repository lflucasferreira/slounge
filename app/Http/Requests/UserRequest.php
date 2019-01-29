<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        // Check Create or Update
        if ($this->method() == 'PATCH') {
            $email = 'required | email | max:255 | unique:users,email,' . $this->get('id'); 
        } else { 
            $email = 'required | email | max:255 | unique:users,email';
        }

        return [
            'name' => 'required | min:3 | max:255',
            'email' => $email
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O nome do usuário é obrigatório.',
            'email.required' => 'O email do usuário é obrigatório',
            'email.unique' => 'O email do usuário já existe.'
        ];
    }
}
