<?php

namespace App\Modules\User\Presentation\Shared;

use App\Modules\User\Domain\User;
use App\Modules\User\Presentation\Shared\ViewModels\UserDetail;
use App\Modules\User\Presentation\Shared\ViewModels\UserItem;

final class UserPresenter
{
    public static function item(User $user): UserItem
    {
        return new UserItem(
            id:         $user->getId(),
            email:      $user->getEmail()->value(),
            isActive:   $user->isActive(),
        );
    }

    public static function detail(User $user): UserDetail
    {
        return new UserDetail(
            id:         $user->getId(),
            name:       $user->getName(),
            email:      $user->getEmail()->value(),
            isActive:   $user->isActive(),
        );
    }

    public static function itemsArray(array $users): array
    {
        return array_map(fn(User $user) => self::item($user), $users);
    }
}
