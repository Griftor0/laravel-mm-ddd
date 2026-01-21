<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Api\Laravel\Mappers;

use App\Modules\User\Application\Commands\UpdateUser\UpdateUserCommand;
use App\Modules\User\Presentation\Api\Laravel\Requests\UpdateRequest;

final readonly class UpdateUserCommandMapper
{
    public static function fromRequest(int $id, UpdateRequest $request): UpdateUserCommand
    {
        $data = $request->validated();

        return new UpdateUserCommand(
            id:         $id,
            name:       $data['name'] ?? null,
            email:      $data['email'] ?? null,
            password:   $data['password'] ?? null,
            isActive:   $data['is_active'] ?? null,
        );
    }
}
