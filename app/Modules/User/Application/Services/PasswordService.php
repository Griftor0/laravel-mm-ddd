<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Services;

use App\Modules\User\Domain\ValueObjects\Password;
use App\Shared\Application\HasherInterface;

final readonly class PasswordService
{
    public function __construct(
        private HasherInterface $hasher
    ) {}

    public function create(string $plain): Password
    {
        return new Password($this->hasher->hash($plain));
    }
}
