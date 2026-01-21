<?php
declare(strict_types=1);

namespace App\Modules\Auth\Presentation\Laravel\Api\Mappers;

use App\Modules\Auth\Application\Commands\RegisterUser\RegisterUserCommand;
use App\Modules\Auth\Presentation\Laravel\Api\Requests\RegisterRequest;

final readonly class RegisterUserCommandMapper
{
    public function fromRequest(RegisterRequest $request): RegisterUserCommand
    {
        $data = $request->validated();

        return new RegisterUserCommand(
            name:       $data['name'],
            email:      $data['email'],
            password:   $data['password'],
        );
    }
}
