<?php
declare(strict_types=1);

namespace App\Modules\User\Infrastructure\Laravel\Eloquent;

use App\Modules\User\Application\Queries\Filters\UserCriteria;
use App\Modules\User\Application\Repositories\UserRepositoryInterface;
use App\Modules\User\Domain\Exceptions\UserAlreadyExistsException;
use App\Modules\User\Domain\User;
use App\Shared\Application\EntityNotFoundException;
use Illuminate\Database\QueryException;

final class UserRepository implements UserRepositoryInterface
{
    public function getAll(UserCriteria $criteria): array
    {
        return UserModel::query()
            ->whenActive($criteria->isActive)
            ->whenPaginated($criteria->pagination)
            ->get()
            ->map(static fn(UserModel $model) => UserModelMapper::modelToEntity($model))
            ->toArray();
    }

    public function getById(int $id): User
    {
        /** @var UserModel|null $model */
        $model = UserModel::query()->find($id);

        if($model === null) {
            throw new EntityNotFoundException('User', $id);
        }

        return UserModelMapper::modelToEntity($model);
    }

    public function save(User $user): User
    {
        try {
            $model = $user->getId()
                ? UserModel::query()->findOrFail($user->getId())
                : new UserModel();

            UserModelMapper::fillModel($model, $user);

            $model->save();
        } catch (QueryException $e) {
            if (str_contains($e->getMessage(), 'users_email_unique')) {
                throw UserAlreadyExistsException::withEmail($user->getEmail()->value());
            }

            throw $e;
        }
        return UserModelMapper::modelToEntity($model);
    }

    public function deleteById(int $id): void
    {
        $deleted = UserModel::query()
            ->whereKey($id)
            ->delete();

        if ($deleted === 0) {
            throw new EntityNotFoundException('User', $id);
        }
    }
}
