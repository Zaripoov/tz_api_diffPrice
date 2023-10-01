<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

class PingController extends ApiController
{
    /**
     * @OA\Get(
     * path="/ping",
     * operationId="Ping",
     * tags={"Ping"},
     * summary="Ping",
     * description="Ping",
     *      @OA\Response(
     *          response=200,
     *          description="Успешно",
     *          @OA\JsonContent()
     *       ),
     * )
     */
    public function ping(): JsonResponse
    {
        return $this->responseSuccess(['ping']);
    }

}
