<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Api\Laravel\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class IndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'active'   => 'sometimes|boolean',
            'page'     => 'sometimes|integer|min:1',
            'per_page' => 'sometimes|integer|min:1',
        ];
    }
}
