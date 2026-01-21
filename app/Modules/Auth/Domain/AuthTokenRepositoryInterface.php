<?php
declare(strict_types=1);

namespace App\Modules\Auth\Domain;

interface AuthTokenRepositoryInterface
{
    public function save(AuthToken $token): void;

    public function findByToken(string $token): ?AuthToken;

    public function delete(AuthToken $token): void;

    public function deleteByUserId(int $userId): void;
}
