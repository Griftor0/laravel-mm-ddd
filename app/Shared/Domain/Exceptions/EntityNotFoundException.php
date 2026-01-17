<?php
declare(strict_types=1);

namespace App\Shared\Domain\Exceptions;

use RuntimeException;

final class EntityNotFoundException extends RuntimeException
{
    public function __construct(
        string $entity,
        string|int|null $id = null
    ) {
        $message = $id !== null
            ? "{$entity} not found ({$id})"
            : "{$entity} not found";

        parent::__construct($message);
    }
}
