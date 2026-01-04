<?php
declare(strict_types=1);

use App\Modules\User\Presentation\Api\UserController;

Route::prefix('api/users')->group(function () {
    Route::get('/',     [UserController::class, 'all']);
    Route::get('/{id}', [UserController::class, 'show']);
});
