<?php

declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Services\Interfaces;

use Modules\CurrencyConversion\Http\Dtos\CurrencyConversionDto;

interface ICurrencyConversionService
{
    public function getCurrencies(CurrencyConversionDto $dto): array;
}
