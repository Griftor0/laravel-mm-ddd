<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Mappers;

use App\Modules\User\Application\Commands\CreateUser\CreateUserCommand;

final readonly class CreateUserCommandMapper {
    public static function fromArray(array $data): CreateUserCommand
    {
        return new CreateUserCommand(
            name:       $data['name'],
            email:      $data['email'],
            password:   $data['password'],
            isActive:   $data['is_active'],
        );
    }
}
