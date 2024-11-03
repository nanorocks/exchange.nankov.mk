<?php

declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Services;

use Modules\CurrencyConversion\Http\Dtos\CurrencyConversionDto;
use Modules\CurrencyConversion\Http\Repositories\Interfaces\ICurrencyConversionRepository;
use Modules\CurrencyConversion\Http\Services\Interfaces\ICurrencyConversionService;

class CurrencyConversionService implements ICurrencyConversionService
{
    public function __construct(private ICurrencyConversionRepository $currencyConversionRepository)
    {
    }

    public function getCurrencies(CurrencyConversionDto $dto): array
    {
        // TODO: Implement getCurrencies() method.
//        $this->currencyConversionRepository
    }
}
