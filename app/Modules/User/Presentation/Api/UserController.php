<?php
declare(strict_types=1);

namespace App\Modules\User\Presentation\Api;

use App\Modules\User\Application\Queries\GetUser\GetUserHandler;
use App\Modules\User\Application\Queries\GetUsers\GetUsersHandler;
use App\Modules\User\Application\Queries\GetUsers\GetUsersQuery;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

final class UserController extends Controller
{
    public function all(GetUsersHandler $getUsers): JsonResponse
    {
        $users = $getUsers->handle(new GetUsersQuery());

        $usersArray = array_map(fn($user) => $user->toArray(), $users);

        return response()->json($usersArray);
    }

    public function show(int $id, GetUserHandler $getUser): JsonResponse
    {
        $user = $getUser->handle($id);

        return response()->json($user->toArray());
    }
}
