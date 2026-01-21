<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Queries\GetUser;

use App\Modules\User\Application\Repositories\UserRepositoryInterface;
use App\Modules\User\Domain\User;

final readonly class GetUserHandler
{
    public function __construct(
        private UserRepositoryInterface $users
    ) {}

    public function handle(int $id): User
    {
        return $this->users->getById($id);
    }
}
