<?php
declare(strict_types=1);

namespace App\Modules\Auth\Domain;

use App\Modules\User\Domain\User;
use App\Shared\Domain\Entity;

final class AuthenticatedUser extends Entity
{
    public function __construct(
        private readonly User $user,
        private readonly AuthToken $token,
    ) {}

    public function toArray(): array
    {
        return [
            'id'            => $this->user->getId(),
            'name'          => $this->user->getName(),
            'email'         => $this->user->getEmail()->value(),
            'isActive'      => $this->user->isActive(),
            'token'         => $this->token->getToken(),
        ];
    }
}
