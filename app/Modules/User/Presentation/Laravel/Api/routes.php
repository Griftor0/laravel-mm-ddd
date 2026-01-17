<?php
declare(strict_types=1);

use App\Modules\User\Presentation\Laravel\Api\UserController;

Route::prefix('api/users')->group(function () {
    Route::get('/',         [UserController::class, 'all']);
    Route::post('/',        [UserController::class, 'store']);

    Route::get('/{id}',     [UserController::class, 'show']);
    Route::patch('/{id}',   [UserController::class, 'update']);
    Route::delete('/{id}',  [UserController::class, 'delete']);
});
