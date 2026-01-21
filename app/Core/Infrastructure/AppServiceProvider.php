<?php
declare(strict_types=1);

namespace App\Core\Infrastructure;

use App\Shared\Application\HasherInterface;
use App\Shared\Infrastructure\Laravel\Services\Hasher;
use Illuminate\Support\Carbon;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $locale = config('app.locale');

        setlocale(LC_ALL, $locale . '.utf8');
        Carbon::setLocale($locale);

        $this->loadMigrationsFrom(
            base_path('app/Core/Infrastructure/Migrations')
        );
    }

    public function register(): void
    {
        $this->app->bind(HasherInterface::class, Hasher::class);
    }
}
