<?php
declare(strict_types=1);

namespace App\Modules\Auth\Presentation\Laravel\Api;

use App\Modules\Auth\Application\Commands\RegisterUser\RegisterUserHandler;
use App\Modules\Auth\Presentation\Laravel\Api\Mappers\RegisterUserCommandMapper;
use App\Modules\Auth\Presentation\Laravel\Api\Requests\RegisterRequest;
use App\Shared\Infrastructure\Laravel\Http\JsonResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

final class AuthController extends Controller
{
    public function __construct(
        private readonly JsonResponseFactory $jsonResponse
    ) {}

    public function register(
        RegisterRequest $request,
        RegisterUserHandler $registerUser,
        RegisterUserCommandMapper $mapper
    ): JsonResponse
    {
        $command = $mapper->fromRequest($request);
        $user = $registerUser->handle($command);

        return $this->jsonResponse->ok($user);
    }

}
