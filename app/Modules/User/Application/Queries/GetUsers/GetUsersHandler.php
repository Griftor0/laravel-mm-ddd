<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Queries\GetUsers;

use App\Modules\User\Application\UserCriteria;
use App\Modules\User\Domain\UserRepositoryInterface;
use App\Shared\Domain\ValueObjects\Pagination;

final readonly class GetUsersHandler
{
    public function __construct(
        private UserRepositoryInterface $users,
    ) {}

    public function handle(GetUsersQuery $query): array
    {
        $criteria = new UserCriteria(
            $query->isActive,
            Pagination::fromNullable($query->pageNumber, $query->perPage)
        );

        return $this->users->getAll($criteria);
    }
}
