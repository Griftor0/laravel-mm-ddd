<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Queries;

use App\Modules\User\Domain\User;
use App\Modules\User\Domain\UserRepositoryInterface;

final readonly class GetUser
{
    public function __construct(
        private UserRepositoryInterface $users
    ) {}

    public function handle(int $id): User
    {
        return $this->users->getById($id);
    }
}
