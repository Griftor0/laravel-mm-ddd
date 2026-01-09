<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Mappers;

use App\Modules\User\Application\Commands\UpdateUser\UpdateUserCommand;

final readonly class UpdateUserCommandMapper {
    public static function fromArray(int $id, array $data): UpdateUserCommand
    {
        return new UpdateUserCommand(
            id:         $id,
            name:       $data['name'] ?? null,
            email:      $data['email'] ?? null,
            password:   $data['password'] ?? null,
            isActive:   $data['is_active'] ?? null,
        );
    }
}
