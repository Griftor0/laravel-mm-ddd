<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Commands;

use App\Modules\User\Domain\UserRepositoryInterface;

final readonly class DeleteUser
{
    public function __construct(
        private UserRepositoryInterface $users,
    ) {}

    public function handle(int $id): void
    {
        $this->users->deleteById($id);
    }
}
