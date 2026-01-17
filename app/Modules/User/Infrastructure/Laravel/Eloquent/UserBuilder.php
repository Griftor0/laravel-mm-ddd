<?php
declare(strict_types=1);

namespace App\Modules\User\Infrastructure\Laravel\Eloquent;

use App\Shared\Infrastructure\Laravel\Eloquent\PaginatedBuilder;

final class UserBuilder extends PaginatedBuilder
{
    public function active(bool $isActive = true): self
    {
        return $this->where('is_active', $isActive);
    }

    public function whenActive(?bool $isActive): self
    {
        if ($isActive === null) {
            return $this;
        }

        return $this->active($isActive);
    }
}
