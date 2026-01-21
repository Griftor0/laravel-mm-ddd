<?php
declare(strict_types=1);

namespace App\Modules\Auth\Domain;

use App\Shared\Domain\Entity;
use DateTimeImmutable;

final class AuthToken extends Entity
{
    public function __construct(
        private string $token,
        private DateTimeImmutable $expiresAt
    ) {}

    public function getToken(): string{ return $this->token; }
    public function refreshToken(string $token): string{ return $this->token = $token; }

    public function toArray(): array
    {
        return [
            'token' => $this->getToken(),
            'expiresAt' => $this->expiresAt,
        ];
    }
}
