<?php

declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Repositories;

use Carbon\Carbon;
use Modules\CurrencyConversion\Http\Dtos\CurrencyConversionDto;
use Modules\CurrencyConversion\Http\Repositories\Interfaces\ICurrencyConversionRepository;
use Modules\CurrencyConversion\Models\Currency;

class CurrencyConversionRepository implements ICurrencyConversionRepository
{
    public function createFixerExchangeRate(array $data): bool
    {
        $currency = new Currency();

        $currency->date = Carbon::parse($data['date']);
        $currency->json = json_encode($data['rates']);

        return $currency->save();
    }

    public function lastRates(): Currency
    {
        return Currency::query()->orderBy('date', 'desc')->first();
    }
}
