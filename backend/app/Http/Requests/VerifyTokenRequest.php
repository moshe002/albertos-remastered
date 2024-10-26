<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VerifyTokenRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => [
                'required',
                Rule::in(['activation', 'password_reset']),
            ],
            'token' => 'required',
        ];
    }

    public function getType(): ?string
    {
        return $this->input('type', null);
    }

    public function getToken(): ?string
    {
        return $this->input('token', null);
    }
}
