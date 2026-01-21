<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Commands\DeleteUser;

use App\Modules\User\Application\Repositories\UserRepositoryInterface;

final readonly class DeleteUserHandler
{
    public function __construct(
        private UserRepositoryInterface $users,
    ) {}

    public function handle(int $id): void
    {
        $this->users->deleteById($id);
    }
}
