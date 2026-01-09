<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Commands\CreateUser;

use App\Modules\User\Application\PasswordFactory;
use App\Modules\User\Domain\User;
use App\Modules\User\Domain\UserRepositoryInterface;
use App\Modules\User\Domain\ValueObjects\Email;

final readonly class CreateUserHandler
{
    public function __construct(
        private UserRepositoryInterface $users,
        private PasswordFactory $password,
    ) {}

    public function handle(CreateUserCommand $command): User
    {
        $user = new User(
            id:       null,
            name:     $command->name,
            email:    new Email($command->email),
            password: $this->password->fromPlain($command->password),
            isActive: $command->isActive
        );

        return $this->users->save($user);
    }
}
