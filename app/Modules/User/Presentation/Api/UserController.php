<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Api;

use App\Modules\User\Application\Commands\CreateUser\CreateUserHandler;
use App\Modules\User\Application\Commands\DeleteUser;
use App\Modules\User\Application\Commands\UpdateUser\UpdateUserHandler;
use App\Modules\User\Application\Queries\GetUser;
use App\Modules\User\Application\Queries\GetUsers\GetUsersHandler;
use App\Modules\User\Presentation\Api\Requests\IndexRequest;
use App\Modules\User\Presentation\Api\Requests\StoreRequest;
use App\Modules\User\Presentation\Api\Requests\UpdateRequest;
use App\Modules\User\Presentation\Mappers\CreateUserCommandMapper;
use App\Modules\User\Presentation\Mappers\GetUsersQueryMapper;
use App\Modules\User\Presentation\Mappers\UpdateUserCommandMapper;
use App\Shared\Infrastructure\Laravel\Http\JsonResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

final class UserController extends Controller
{
    public function __construct(
        private readonly JsonResponseFactory $jsonResponse
    ) {}

    public function all(IndexRequest $request, GetUsersHandler $getUsers): JsonResponse
    {
        $query = GetUsersQueryMapper::fromArray($request->validated());
        $users = $getUsers->handle($query);

        return $this->jsonResponse->ok($users);
    }

    public function store(StoreRequest $request, CreateUserHandler $createUser): JsonResponse
    {
        $command = CreateUserCommandMapper::fromArray($request->validated());
        $user = $createUser->handle($command);

        return $this->jsonResponse->created($user);
    }

    public function show(int $id, GetUser $getUser): JsonResponse
    {
        $user = $getUser->handle($id);

        return $this->jsonResponse->ok($user);
    }

    public function update(int $id, UpdateRequest $request, UpdateUserHandler $updateUser): JsonResponse
    {
        $command = UpdateUserCommandMapper::fromArray($id, $request->validated());
        $user = $updateUser->handle($command);

        return $this->jsonResponse->ok($user);
    }

    public function delete(int $id, DeleteUser $deleteUser): JsonResponse
    {
        $deleteUser->handle($id);

        return $this->jsonResponse->noContent();
    }
}
