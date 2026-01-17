<?php
declare(strict_types=1);

namespace App\Modules\User\Domain\ValueObjects;

use InvalidArgumentException;

final class Email
{
    public function __construct(private string $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(sprintf('Invalid email address: "%s".', $value));
        }
    }

    public function value(): string { return $this->value; }
}
