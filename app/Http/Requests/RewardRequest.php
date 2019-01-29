<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RewardRequest extends FormRequest
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
            'appointment_id' => ['nullable'],
            'user_id' => ['required'],
            'pontos' => ['required'],
            'data' => ['required_with:hora'],
            'hora' => ['nullable', 'date_format:H:i'],
            'status' => ['required'],
            'resgatado' => ['required'],
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
            'pontos.required' => 'O número de pontos é obrigatório.',
            'status.required' => 'O status é obrigatório.',
            'resgatado.required' => 'A condição é obrigatória.',
            'data.required_with' => 'A data é obrigatória quando a hora é informada.'
        ];
    }
}
