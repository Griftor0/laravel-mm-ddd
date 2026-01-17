<?php

namespace App\Modules\User\Presentation\Laravel\Api\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'      => 'sometimes|string',
            'email'     => 'sometimes|string',
            'password'  => 'sometimes|string|min:8',
            'is_active' => 'sometimes|boolean',
        ];
    }
}
