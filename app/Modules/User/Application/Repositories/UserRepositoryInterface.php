<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Repositories;

use App\Modules\User\Application\Queries\Filters\UserCriteria;
use App\Modules\User\Domain\Exceptions\UserAlreadyExistsException;
use App\Modules\User\Domain\User;
use App\Shared\Application\EntityNotFoundException;

interface UserRepositoryInterface
{
    public function getAll(UserCriteria $criteria): array;
    /**
     * @throws EntityNotFoundException
     */
    public function getById(int $id): ?User;
    /**
     * @throws UserAlreadyExistsException
     */
    public function save(User $user): User;
    /**
     * @throws EntityNotFoundException
     */
    public function deleteById(int $id): void;
}
