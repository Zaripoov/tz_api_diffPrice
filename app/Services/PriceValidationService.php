<?php

namespace App\Services;

use App\Components\Validator\PriceValidator;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PriceValidationService
{
    public function validatePriceDiff(float $newPrice, float $oldPrice): array
    {
        // Создание экземпляра PriceValidator с заданным максимальным отклонением
        $validator = new PriceValidator(10.0); // Пример: максимальное отклонение 10%

        // Проверка отклонения
        if ($validator->diffPrice($newPrice, $oldPrice)) {
            return [
                'data' => [
                    'message' => 'Отклонение в пределах допустимого значения',
                    'deviation' => $validator->getDeviation(),
                ],
                'status' => ResponseAlias::HTTP_OK
            ];
        } else {
            return [
                'data' => [
                    'message' => 'Отклонение превышает допустимое значение',
                ],
                'status' => ResponseAlias::HTTP_BAD_REQUEST
            ];
        }
    }
}
