<?php
declare(strict_types=1);

namespace App\Shared\Domain;

interface HasherInterface
{
    public function hash(string $plain): string;
    public function verify(string $plain, string $hashed): bool;
}
