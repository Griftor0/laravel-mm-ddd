<?php

namespace App\Modules\User\Presentation\Laravel\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      => 'required|string',
            'email'     => 'required|string',
            'password'  => 'required|string|min:8',
            'is_active' => 'required|boolean',
        ];
    }
}
