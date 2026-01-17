<?php
declare(strict_types=1);

namespace App\Modules\User\Domain\Exceptions;

use RuntimeException;

final class UserAlreadyExistsException extends RuntimeException
{
    public static function withEmail(string $email): self
    {
        return new self(sprintf('User with email "%s" already exists.', $email));
    }
}
