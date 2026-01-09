<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Mappers;

use App\Modules\User\Application\Queries\GetUsers\GetUsersQuery;

final readonly class GetUsersQueryMapper {
    public static function fromArray(array $data): GetUsersQuery
    {
        return new GetUsersQuery(
            isActive:   $data['active'] ?? null,
            pageNumber: $data['page'] ?? null,
            perPage:    $data['per_page'] ?? null,
        );
    }
}
