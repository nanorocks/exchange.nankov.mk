<?php
declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CurrencyConversion\Http\Services\Interfaces\ICurrencyConversionService;
use Modules\CurrencyConversion\Transformers\SupportedCurrencyConversionResource;

class SupportedCurrencyExchangeActionController extends Controller
{
    public function __invoke(ICurrencyConversionService $currencyConversionService): SupportedCurrencyConversionResource
    {
        return new SupportedCurrencyConversionResource(
            $currencyConversionService->getSupportedExchangeRates()
        );
    }
}
