<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            $nome = 'required | string | max:50 | unique:services,nome,' . $this->get('id');
        } else { 
            $nome = 'required | string | max:50 | unique:services,nome';
        }

        return [
            'nome' => $nome,
            'sku' => ['nullable'],
            'descricao' => ['nullable', 'min:3', 'max:50'],
            'preco' => ['nullable'],
            'duracao' => ['nullable'],
            'inicio' => ['nullable', 'date'],
            'fim' => ['nullable', 'date'],
            'user_id' => ['required'],
            'category_id' => ['required']
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
            'nome.required' => 'O nome do serviço é obrigatório.',
            'nome.unique' => 'O nome do serviço já existe.'
        ];
    }
}
