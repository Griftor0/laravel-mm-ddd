<?php
declare(strict_types=1);

namespace App\Modules\User\Application;

use App\Modules\User\Domain\ValueObjects\Password;
use App\Shared\Domain\HasherInterface;

final readonly class PasswordFactory
{
    public function __construct(
        private HasherInterface $hasher
    ) {}

    public function fromPlain(string $plain): Password
    {
        $hash = $this->hasher->hash($plain);

        return new Password($hash);
    }
}
