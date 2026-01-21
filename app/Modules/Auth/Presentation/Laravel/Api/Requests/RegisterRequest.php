<?php

namespace App\Modules\Auth\Presentation\Laravel\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class RegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      => 'required|string',
            'email'     => 'required|string',
            'password'  => 'required|string|confirmed|min:8'
        ];
    }
}
