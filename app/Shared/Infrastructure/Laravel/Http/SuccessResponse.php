<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Laravel\Http;

final readonly class SuccessResponse
{
    public function __construct(
        public mixed $result,
        public ?array $meta = null,
    ) {}
}
