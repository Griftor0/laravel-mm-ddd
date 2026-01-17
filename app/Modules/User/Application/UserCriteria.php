<?php
declare(strict_types=1);

namespace App\Modules\User\Application;

use App\Shared\Domain\ValueObjects\Pagination;

final readonly class UserCriteria
{
    public function __construct(
        public ?bool         $isActive = null,
        public ?Pagination   $pagination = null,
    ) {}
}
