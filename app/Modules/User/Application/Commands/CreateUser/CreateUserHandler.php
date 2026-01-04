<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Commands\CreateUser;

use App\Modules\User\Domain\User;
use App\Modules\User\Domain\UserRepositoryInterface;

final readonly class CreateUserHandler
{
    public function __construct(
        private UserRepositoryInterface $users,
    ) {}

    public function handle(CreateUserCommand $payload): User
    {
        return $this->users->store($payload->user, $payload->password);
    }
}
