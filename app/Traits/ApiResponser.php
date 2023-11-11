<?php

namespace App\Traits;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

trait ApiResponser
{
    protected function success($data, int $code = Response::HTTP_OK): JsonResponse
    {
        $data = (is_array($data) ?
            array_key_exists('data', $data)
            : true) ? (is_object($data)
            ? ['data' => $data]
            : $data)
            : ['data' => $data];
        return response()->json($data, $code);
    }

    protected function error(?string $message = null, int $code): JsonResponse
    {
        return response()->json([
            'message' => $message,
        ], $code);
    }

    protected function noContent($status = Response::HTTP_NO_CONTENT, array $headers = []): Response
    {
        return response()->noContent($status, $headers);
    }

    protected function noContentWithMessage($message, $status, array $headers = []): JsonResponse
    {
        return response()->json([
            $message
        ], $status, $headers);
    }
}
