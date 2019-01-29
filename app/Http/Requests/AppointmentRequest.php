<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'service_id' => ['required'],
            'data' => ['required'],
            'inicio' => ['required', 'date_format:H:i'],
            'fim' => ['required', 'date_format:H:i', 'after:inicio'],
            'preco' => ['required', 'numeric'],
            'situacao' => ['required'],
            'observacao' => ['nullable']
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
            'service_id.required' => 'O serviço é obrigatório.',
            'data.required' => 'A data é obrigatória.',
            'inicio.required' => 'A hora de início é obrigatória.',
            'fim.required' => 'A hora de término é obrigatória.',
            'situacao.required' => 'A situação é obrigatória.',
            'fim.after' => 'A hora de término deve ser após a hora de início.'
        ];
    }
}
