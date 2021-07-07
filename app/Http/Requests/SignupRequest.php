<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'string', 'max:255', 'min:8', 'confirmed'],
            'image' => ['required', 'image', 'max:1024', 'mimes:png,jpeg,jpg,gif,svg'],
        ];
    }
}
