<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Api\Laravel\Requests;

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
