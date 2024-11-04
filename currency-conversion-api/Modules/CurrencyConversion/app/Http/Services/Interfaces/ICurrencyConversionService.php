<?php

declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Services\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Modules\CurrencyConversion\Http\Dtos\CurrencyConversionDto;

interface ICurrencyConversionService
{
    public function getCurrencyCalculation(CurrencyConversionDto $dto): array;
    public function syncSupportedFixerExchangeRate(): void;
    public function syncFixerExchangeRateEndpoint(): bool;
    public function getSupportedExchangeRates(): Collection;
}
