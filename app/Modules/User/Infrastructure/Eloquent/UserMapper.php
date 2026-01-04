<?php
declare(strict_types=1);

namespace App\Modules\User\Infrastructure\Eloquent;

use App\Modules\User\Domain\User;

final class UserMapper
{
    public static function fromModel(UserModel $model): User
    {
        return new User(
            id:         $model->id,
            name:       $model->name,
            email:      $model->email,
            isActive:   $model->is_active,
        );
    }

    public static function toModel(User $entity): UserModel
    {
        $model = new UserModel();
        $model->id          = $entity->id;
        $model->name        = $entity->name;
        $model->email       = $entity->email;
        $model->is_active   = $entity->isActive;
        return $model;
    }
}
