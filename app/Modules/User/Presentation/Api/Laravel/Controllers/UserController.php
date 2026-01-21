<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Api\Laravel\Controllers;

use App\Modules\User\Application\Commands\CreateUser\CreateUserHandler;
use App\Modules\User\Application\Commands\DeleteUser\DeleteUserHandler;
use App\Modules\User\Application\Commands\UpdateUser\UpdateUserHandler;
use App\Modules\User\Application\Queries\GetUser\GetUserHandler;
use App\Modules\User\Application\Queries\GetUsers\GetUsersHandler;
use App\Modules\User\Presentation\Api\Laravel\Mappers\CreateUserCommandMapper;
use App\Modules\User\Presentation\Api\Laravel\Mappers\GetUsersQueryMapper;
use App\Modules\User\Presentation\Api\Laravel\Mappers\UpdateUserCommandMapper;
use App\Modules\User\Presentation\Api\Laravel\Requests\IndexRequest;
use App\Modules\User\Presentation\Api\Laravel\Requests\StoreRequest;
use App\Modules\User\Presentation\Api\Laravel\Requests\UpdateRequest;
use App\Modules\User\Presentation\Shared\UserPresenter;
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
        $query = GetUsersQueryMapper::fromRequest($request);
        $users = $getUsers->handle($query);

        return $this->jsonResponse->ok(UserPresenter::itemsArray($users));
    }

    public function store(StoreRequest $request, CreateUserHandler $createUser): JsonResponse
    {
        $command = CreateUserCommandMapper::fromRequest($request);
        $user = $createUser->handle($command);

        return $this->jsonResponse->created(UserPresenter::detail($user));
    }

    public function show(int $id, GetUserHandler $getUser): JsonResponse
    {
        $user = $getUser->handle($id);

        return $this->jsonResponse->ok(UserPresenter::detail($user));
    }

    public function update(int $id, UpdateRequest $request, UpdateUserHandler $updateUser): JsonResponse
    {
        $command = UpdateUserCommandMapper::fromRequest($id, $request);
        $user = $updateUser->handle($command);

        return $this->jsonResponse->ok(UserPresenter::detail($user));
    }

    public function delete(int $id, DeleteUserHandler $deleteUser): JsonResponse
    {
        $deleteUser->handle($id);

        return $this->jsonResponse->noContent();
    }
}
