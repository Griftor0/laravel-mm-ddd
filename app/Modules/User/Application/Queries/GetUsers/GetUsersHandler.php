<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Queries\GetUsers;

use App\Modules\User\Domain\User;
use App\Modules\User\Domain\UserRepositoryInterface;

final readonly class GetUsersHandler
{
    public function __construct(
        private UserRepositoryInterface $users
    ) {}

    public function handle(GetUsersQuery $query): array
    {
        return $this->users->getAll($query->isActive, $query->page, $query->perPage);
    }
}
