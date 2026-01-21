<?php
declare(strict_types=1);

namespace App\Modules\User\Domain;

use App\Modules\User\Domain\ValueObjects\Email;
use App\Modules\User\Domain\ValueObjects\Password;

final class User
{
    public function __construct(
        private readonly ?int $id,
        private string $name,
        private Email $email,
        private Password $password,
        private bool $isActive = true
    ) {}

    public function getId(): ?int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getEmail(): Email { return $this->email; }
    public function isActive(): bool { return $this->isActive; }
    public function getPassword(): Password { return $this->password; }
    public function rename(string $name): void { $this->name = $name; }
    public function changeEmail(Email $email): void { $this->email = $email; }
    public function activate(): void { $this->isActive = true; }
    public function deactivate(): void { $this->isActive = false; }
    public function changePassword(Password $password): void { $this->password = $password; }
}
