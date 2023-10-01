<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\PriceValidationRequest;
use App\Services\PriceValidationService;
use Illuminate\Http\JsonResponse;

class PriceValidationController extends ApiController
{
    private PriceValidationService $priceValidationService;

    public function __construct(PriceValidationService $priceValidationService)
    {
        $this->priceValidationService = $priceValidationService;
    }

    public function validatePrice(PriceValidationRequest $request): JsonResponse
    {
        $result = $this->priceValidationService->validatePriceDiff($request->getNewPrice(), $request->getOldPrice());
        return $this->responseSuccess(
            data: $result['data'],
            status: $result['status']
        );
    }
}
