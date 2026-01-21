<?php
declare(strict_types=1);

use App\Modules\Auth\Presentation\Laravel\Api\Authcontroller;

Route::prefix('api/auth')->group(function () {
    Route::get('/me',        [Authcontroller::class, 'me']);
    Route::post('/login',    [Authcontroller::class, 'login']);
    Route::post('/logout',   [Authcontroller::class, 'logout']);
    Route::post('/register', [Authcontroller::class, 'register']);
});
