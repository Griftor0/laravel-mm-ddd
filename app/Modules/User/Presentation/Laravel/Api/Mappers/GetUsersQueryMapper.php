<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Laravel\Api\Mappers;

use App\Modules\User\Application\Queries\GetUsers\GetUsersQuery;
use App\Modules\User\Presentation\Laravel\Api\Requests\IndexRequest;

final readonly class GetUsersQueryMapper
{
    public function fromRequest(IndexRequest $request): GetUsersQuery
    {
        $data = $request->validated();

        return new GetUsersQuery(
            isActive:   $data['active'] ?? null,
            pageNumber: $data['page'] ?? null,
            perPage:    $data['per_page'] ?? null,
        );
    }
}
