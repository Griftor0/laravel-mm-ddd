<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Queries\GetUsers;

final readonly class GetUsersQuery
{
    public function __construct(
        public ?bool $isActive = null,
        public ?int  $page     = null,
        public ?int  $perPage  = null,
    ) {}
}
