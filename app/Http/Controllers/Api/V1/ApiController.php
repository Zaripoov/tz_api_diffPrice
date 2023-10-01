<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Crypto API-документация",
 *     description="Crypto API-документация",
 * ),
 * @OA\Server(
 *     url="/v1/",
 * )
 */
class ApiController extends Controller
{
    public function responseSuccess(?array $data = [], int $status = Response::HTTP_OK): JsonResponse
    {
        return response()->json(
            data: $data,
            status: $status);
    }

    public function responseErrorMessage(string $message): JsonResponse
    {
        return $this->responseError([
            'message' => $message,
        ]);
    }

    public function responseServerError(): JsonResponse
    {
        return $this->responseErrorMessage(message: 'Server error.');
    }


    public function responseError(array $data = [], int $status = Response::HTTP_UNPROCESSABLE_ENTITY): JsonResponse
    {
        return response()->json(
            $data,
            $status
        );
    }

    public function responseErrorServer(?string $error = null): JsonResponse
    {
        return response()->json([
            'message' => __('Server error.'),
            'code' => 500,
            'error' => app()->isLocal() ? $error : null,
        ], 500);
    }
}
