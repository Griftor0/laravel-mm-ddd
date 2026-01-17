<?php
declare(strict_types=1);

namespace App\Shared\Domain\ValueObjects;

use InvalidArgumentException;

final readonly class Pagination
{
    private const DEFAULT_PER_PAGE = 20;

    private function __construct(
        private int $page,
        private int $perPage
    )
    {
        if ($page < 1) {
            throw new InvalidArgumentException('Page must be >= 1.');
        }

        if ($perPage < 1) {
            throw new InvalidArgumentException('Per page must be >= 1.');
        }
    }

    public static function fromNullable(?int $page, ?int $perPage): ?self
    {
        if ($page === null && $perPage === null) {
            return null;
        }

        return new self($page ?? 1, $perPage ?? self::DEFAULT_PER_PAGE);
    }

    public static function first(int $perPage = self::DEFAULT_PER_PAGE): self
    {
        return new self(1, $perPage);
    }

    public function page(): int{ return $this->page; }
    public function perPage(): int{ return $this->perPage; }

    public function offset(): int
    {
        return ($this->page() - 1) * $this->perPage();
    }
}
