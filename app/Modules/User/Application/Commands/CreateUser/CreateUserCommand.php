<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Commands\CreateUser;

use App\Modules\User\Domain\User;

final readonly class CreateUserCommand {
    public function __construct(
        public User   $user,
        public string $password,
    ) {}
}
