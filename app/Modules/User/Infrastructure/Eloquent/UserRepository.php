<?php
declare(strict_types=1);

namespace App\Modules\User\Infrastructure\Eloquent;

use App\Modules\User\Domain\User;
use App\Modules\User\Domain\UserRepositoryInterface;

final class UserRepository implements UserRepositoryInterface
{
    public function getAll(
        ?bool $isActive = null,
        ?int  $page     = null,
        ?int  $perPage  = null
    ): ?array
    {
        $query = UserModel::query();

        if ($isActive !== null) {
            $query->where('is_active', $isActive);
        }

        if ($page !== null && $perPage !== null) {
            $query->skip(($page - 1) * $perPage)
                ->take($perPage);
        }

        $models = $query->get();

        $users = [];
        foreach ($models as $model) {
            $users[] = UserMapper::fromModel($model);
        }

        return $users;
    }

    public function getById(int $id): ?User
    {
        $model = UserModel::query()->find($id);

        return $model ? UserMapper::fromModel($model) : null;
    }

    public function getByEmail(string $email): ?User
    {
        $model = UserModel::query()->firstWhere('email', $email);

        return $model ? UserMapper::fromModel($model) : null;
    }

    public function store(User $user, string $password): User
    {
        $user = UserMapper::toModel($user);
        $user->password = $password;
        $user->save();

        return UserMapper::fromModel($user);
    }

    public function update(User $user, ?string $password = null): void
    {
        $user = UserMapper::toModel($user);
        if ($password !== null) {
            $user->password = $password;
        }
        $user->save();
    }

    public function delete(int $id): void
    {
        $model = UserModel::query()->findOrFail($id);

        $model->delete();
    }
}
