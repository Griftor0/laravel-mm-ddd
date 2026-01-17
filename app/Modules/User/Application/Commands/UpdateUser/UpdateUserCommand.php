<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Commands\UpdateUser;

final readonly class UpdateUserCommand {
    public function __construct(
        public int     $id,
        public ?string $name,
        public ?string $email,
        public ?string $password,
        public ?bool   $isActive,
    ) {}
}
