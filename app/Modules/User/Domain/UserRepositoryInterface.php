<?php
declare(strict_types=1);

namespace App\Modules\User\Domain;

use App\Modules\User\Application\UserCriteria;
use App\Modules\User\Domain\Exceptions\UserAlreadyExistsException;
use App\Modules\User\Domain\ValueObjects\Email;
use App\Shared\Domain\Exceptions\EntityNotFoundException;

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
