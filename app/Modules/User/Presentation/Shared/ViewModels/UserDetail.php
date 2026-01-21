<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Shared\ViewModels;

final readonly class UserDetail
{
    public function __construct(
        public int      $id,
        public string   $name,
        public string   $email,
        public bool     $isActive,
    ) {}
}
