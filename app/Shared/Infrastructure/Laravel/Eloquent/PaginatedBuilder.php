<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Laravel\Eloquent;

use App\Shared\Domain\ValueObjects\Pagination;
use Illuminate\Database\Eloquent\Builder;

abstract class PaginatedBuilder extends Builder
{
    public function whenPaginated(?Pagination $pagination): self
    {
        if ($pagination !== null) {
            $this->skip($pagination->offset())->take($pagination->perPage());
        }
        return $this;
    }
}
