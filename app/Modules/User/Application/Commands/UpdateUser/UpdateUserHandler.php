<?php
declare(strict_types=1);

namespace App\Modules\User\Application\Commands\UpdateUser;

use App\Modules\User\Application\Repositories\UserRepositoryInterface;
use App\Modules\User\Application\Services\PasswordService;
use App\Modules\User\Domain\User;
use App\Modules\User\Domain\ValueObjects\Email;

final readonly class UpdateUserHandler
{
    public function __construct(
        private UserRepositoryInterface $users,
        private PasswordService         $passwordService,
    ) {}

    public function handle(UpdateUserCommand $command): User
    {
        $user = $this->users->getById($command->id);

        $isChanged = $this->changeUserByCommand($user, $command);

        if ($isChanged) {
            $this->users->save($user);
        }

        return $user;
    }

    private function changeUserByCommand(User $user, UpdateUserCommand $command): bool
    {
        $isChanged = false;

        if ($command->email !== null) {
            $user->changeEmail(new Email($command->email));
            $isChanged = true;
        }

        if ($command->name !== null) {
            $user->rename($command->name);
            $isChanged = true;
        }

        if ($command->isActive !== null) {
            $command->isActive ? $user->activate() : $user->deactivate();
            $isChanged = true;
        }

        if ($command->password !== null) {
            $newPassword = $this->passwordService->create($command->password);
            $user->changePassword($newPassword);
            $isChanged = true;
        }

        return $isChanged;
    }
}
