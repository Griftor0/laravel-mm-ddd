<?php
declare(strict_types=1);

namespace App\Shared\Infrastructure\Laravel\Http;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

final readonly class JsonResponseFactory
{
    public function noContent(): JsonResponse
    {
        return new JsonResponse(status: Response::HTTP_NO_CONTENT);
    }

    public function ok(mixed $data, ?array $meta = null): JsonResponse
    {
        return new JsonResponse(new SuccessResponse($data, $meta), Response::HTTP_OK);
    }

    public function created(mixed $data, ?array $meta = null): JsonResponse
    {
        return new JsonResponse(new SuccessResponse($data, $meta), Response::HTTP_CREATED);
    }
}
