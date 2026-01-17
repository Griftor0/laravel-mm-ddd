<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Commands\CreateUser;

final readonly class CreateUserCommand {
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public bool   $isActive,
    ) {}
}
