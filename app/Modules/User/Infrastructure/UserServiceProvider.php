<?php
declare(strict_types=1);

namespace App\Modules\User\Infrastructure;

use App\Modules\User\Domain\UserRepositoryInterface;
use App\Modules\User\Infrastructure\Eloquent\UserRepository;
use Illuminate\Support\ServiceProvider;

final class UserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $modulePath = base_path('app/Modules/User');

        $this->loadMigrationsFrom($modulePath . '/Infrastructure/Migrations');
        $this->loadRoutesFrom($modulePath . '/Presentation/Web/routes.php');
        $this->loadRoutesFrom($modulePath . '/Presentation/Api/routes.php');
    }

    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
