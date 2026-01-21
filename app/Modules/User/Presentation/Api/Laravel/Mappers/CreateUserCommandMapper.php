<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Api\Laravel\Mappers;

use App\Modules\User\Application\Commands\CreateUser\CreateUserCommand;
use App\Modules\User\Presentation\Api\Laravel\Requests\StoreRequest;

final readonly class CreateUserCommandMapper
{
    public static function fromRequest(StoreRequest $request): CreateUserCommand
    {
        $data = $request->validated();

        return new CreateUserCommand(
            name:       $data['name'],
            email:      $data['email'],
            password:   $data['password'],
            isActive:   $data['is_active'],
        );
    }
}
