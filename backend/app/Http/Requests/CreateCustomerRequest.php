<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
        return [
            'name' => ['string', 'required'],
            'address' => ['string', 'required'],
            'phone_number' => ['number', 'required'],
            'email' => ['string', 'required', 'email'],
            'password' => ['string', 'password', 'required'],
        ];
    }

    public function getName(): string
    {
        return $this->input('name');
    }

    public function getAddress(): string
    {
        return $this->input('address');
    }

    public function getPhoneNumber(): int
    {
        return $this->input('phone_number');
    }

    public function getEmail(): string
    {
        return $this->input('email');
    }

    public function getPassword(): string
    {
        return $this->input('password');
    }
}
