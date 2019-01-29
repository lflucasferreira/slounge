<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            $nome = 'required | string | min:3 | max:255 | unique:categories,nome,' . $this->get('id'); 
        } else { 
            $nome = 'required | string | min:3 | max:255 | unique:categories,nome';
        }

        return [
            'nome' => $nome,
            'status' => 'required'
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
            'nome.required' => 'O nome da categoria é obrigatório.',
            'nome.unique' => 'O nome da categoria já existe.',
            'status.required' => 'O status da categoria é obrigatório'
        ];
    }
}
