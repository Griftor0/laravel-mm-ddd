<?php
declare(strict_types=1);

namespace App\Modules\User\Infrastructure\Laravel\Eloquent;

use App\Modules\User\Domain\User;
use App\Modules\User\Domain\ValueObjects\Email;
use App\Modules\User\Domain\ValueObjects\Password;

final class UserModelMapper
{
    public static function modelToEntity(UserModel $model): User
    {
        return new User(
            id:         $model->id,
            name:       $model->name,
            email:      new Email($model->email),
            password:   new Password($model->password),
            isActive:   $model->is_active,
        );
    }

    public static function fillModel(UserModel $model, User $entity): void
    {
        $model->name      = $entity->getName();
        $model->email     = $entity->getEmail()->value();
        $model->password  = $entity->getPassword()->value();
        $model->is_active = $entity->isActive();
    }
}
