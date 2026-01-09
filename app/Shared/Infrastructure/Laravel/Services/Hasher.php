<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Laravel\Services;

use App\Shared\Domain\HasherInterface;
use Illuminate\Support\Facades\Hash;

final class Hasher implements HasherInterface
{
    public function hash(string $plain): string
    {
        return Hash::make($plain);
    }

    public function verify(string $plain, string $hashed): bool
    {
        return Hash::check($plain, $hashed);
    }
}
