<?php
declare(strict_types=1);

namespace App\Modules\User\Domain;

interface UserRepositoryInterface
{
    public function getAll(
        ?bool $isActive = null,
        ?int  $page     = null,
        ?int  $perPage  = null
    ): ?array;
    public function getById(int $id): ?User;
    public function getByEmail(string $email): ?User;
    public function store(User $user, string $password): User;
    public function update(User $user, ?string $password = null): void;
    public function delete(string $id): void;

}
