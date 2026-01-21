<?php
declare(strict_types=1);

namespace App\Modules\Auth\Application\Commands\RegisterUser;

use App\Modules\Auth\Domain\AuthenticatedUser;
use App\Modules\User\Application\Repositories\UserRepositoryInterface;
use App\Modules\User\Application\Services\PasswordService;
use App\Modules\User\Domain\User;
use App\Modules\User\Domain\ValueObjects\Email;

final readonly class RegisterUserHandler
{
    public function __construct(
        private UserRepositoryInterface $users,
        private PasswordService         $password,
    ) {}

    public function handle(RegisterUserCommand $command): AuthenticatedUser
    {
        $user = new User(
            id:       null,
            name:     $command->name,
            email:    new Email($command->email),
            password: $this->password->fromPlain($command->password),
            isActive: true
        );

        $user = $this->users->save($user);

        return new AuthenticatedUser($user, $token);
    }
}
