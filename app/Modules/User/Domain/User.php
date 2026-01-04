<?php
declare(strict_types=1);

namespace App\Modules\User\Domain;

final readonly class User
{
    public function __construct(
        public ?int   $id,
        public string $name,
        public string $email,
        public bool   $isActive = true
    ) {}

    public function toArray(): array
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'email'         => $this->email,
            'isActive'      => $this->isActive,
        ];
    }
}
