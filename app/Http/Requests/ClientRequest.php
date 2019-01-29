<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            $email = 'nullable | email | max:255 | unique:clients,email,' . $this->get('id'); 
            $cpf = 'nullable | max:11 | unique:clients,cpf,' . $this->get('id'); 
        } else { 
            $email = 'nullable | email | max:255 | unique:clients,email';
            $cpf = 'nullable | max:11 | unique:clients,cpf';
        }

        return [
            'email' => $email,
            'cpf' => $cpf,
            'nome' => ['required', 'min:3', 'max:255'],
            'sobrenome' => ['required', 'min:3', 'max:255'],
            'endereco' => ['nullable', 'max:255'],
            'complemento' => ['nullable', 'max:255'],
            'edificio' => ['nullable', 'max:255'],
            'bairro' => ['nullable', 'max:255'],
            'cidade' => ['nullable', 'max:255'],
            'cep' => ['nullable', 'max:255'],
            'estado' => ['nullable', 'max:255'],
            'data_nascimento' => ['nullable', 'max:10'],
            'status' => ['nullable', 'max:1'],
            'telefone_fixo' => ['nullable', 'max:11'],
            'telefone_celular' => ['nullable', 'max:11'],
            'telefone_comercial' => ['nullable', 'max:11'],
            'rg' => ['nullable', 'max:10'],
            'orgao' => ['nullable', 'max:10']
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
            'nome.required' => 'O nome do cliente é obrigatório.',
            'sobrenome.required' => 'O sobrenome do cliente é obrigatório',
            'email.unique' => 'O email do cliente já existe.',
            'cpf.unique' => 'O CPF do cliente já existe.'
        ];
    }
}
