<?php
declare(strict_types=1);

namespace App\Modules\Auth\Infrastructure\Laravel;

use Illuminate\Support\ServiceProvider;

final class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $modulePath = base_path('app/Modules/Auth');

        $this->loadMigrationsFrom($modulePath . '/Infrastructure/Laravel/Migrations');
        $this->loadRoutesFrom($modulePath . '/Presentation/Laravel/Api/routes.php');
    }
}
