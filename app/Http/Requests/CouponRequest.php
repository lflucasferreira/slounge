<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'client_id' => ['required'],
            'user_id' => ['required'],
            'codigo' => ['required'],
            'status' => ['required'],
            'aplicado' => ['required'],
            'descricao' => ['nullable'],
            'pontos' => ['nullable'],
            'valor' => ['nullable'],
            'validade' => ['nullable', 'date'],
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
            'client_id.required' => 'O cliente é obrigatório.',
            'user_id.required' => 'O usuário é obrigatório.',
            'codigo.required' => 'O código é obrigatório.',
            'status.required' => 'A situação é obrigatória.',
            'aplicado.required' => 'A condição é obrigatória.'
        ];
    }
}
