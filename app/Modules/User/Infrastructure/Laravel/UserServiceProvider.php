<?php
declare(strict_types=1);

namespace App\Modules\User\Infrastructure\Laravel;

use App\Modules\User\Application\Repositories\UserRepositoryInterface;
use App\Modules\User\Infrastructure\Laravel\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

final class UserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $modulePath = base_path('app/Modules/User');

        $this->loadMigrationsFrom($modulePath . '/Infrastructure/Laravel/Migrations');
        $this->loadRoutesFrom($modulePath . '/Presentation/Api/Laravel/routes.php');
    }

    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
