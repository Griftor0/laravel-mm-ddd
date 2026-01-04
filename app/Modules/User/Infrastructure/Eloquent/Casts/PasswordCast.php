<?php
declare(strict_types=1);

namespace App\Modules\User\Infrastructure\Eloquent\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

final class PasswordCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return $value;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return bcrypt($value);
    }
}
