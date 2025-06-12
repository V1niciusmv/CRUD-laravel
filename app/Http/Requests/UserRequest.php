<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('user')?->id;

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . ($userId ? $userId : null),
        ];

        if (!$userId) {
            $rules['password'] = 'required|min:6';
        } else {
            $rules['password'] = 'nullable|min:6';
        }

        return $rules;
    }

    public function messages(): array {
        return [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Necessario enviar o email válido.',
            'email.unique' => 'Este email já está em uso.',
            'password.required' => 'Senha é obrigatória.',
            'password.min' => 'Deve ter no mínimo 6 caracteres.',
        ];
    }
}
