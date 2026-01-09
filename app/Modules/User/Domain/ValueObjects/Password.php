<?php
declare(strict_types=1);

namespace App\Modules\User\Domain\ValueObjects;

final readonly class Password
{
    public function __construct(private string $value) {}

    public function value(): string { return $this->value; }

    public function equals(Password $other): bool
    {
        return $this->value() === $other->value();
    }
}
