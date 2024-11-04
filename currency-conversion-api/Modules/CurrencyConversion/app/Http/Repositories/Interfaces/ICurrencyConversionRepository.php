<?php

declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Repositories\Interfaces;

use Modules\CurrencyConversion\Models\Currency;

interface ICurrencyConversionRepository
{
    public function createFixerExchangeRate(array $data): bool;

    public function lastRates(): Currency;
}
