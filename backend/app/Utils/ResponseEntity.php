<?php

namespace App\Utils;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Symfony\Component\HttpFoundation\Response;


trait ResponseEntity
{


    public function jsonError(string $message, int $status): JsonResponse
    {
        $data = [
            "error"     => $message,
            "timestamp" => Carbon::now()->toDateTimeString(),
            "path"      => \Request::getRequestUri()
        ];

        return response()->json($data, $status);
    }

    public function jsonUnauthorized(): JsonResponse
    {
        return $this->jsonError("Unauthorized", Response::HTTP_UNAUTHORIZED);
    }

    public function jsonForbidden(?string $message = null): JsonResponse
    {
        return $this->jsonError($message ?? "Unauthorized", Response::HTTP_FORBIDDEN);
    }

    public function jsonUnprocessable(): JsonResponse
    {
        return $this->jsonError("Validation error", Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function jsonNotFound(?string $message = "Not found"): JsonResponse
    {
        return $this->jsonError($message, Response::HTTP_NOT_FOUND);
    }

}
