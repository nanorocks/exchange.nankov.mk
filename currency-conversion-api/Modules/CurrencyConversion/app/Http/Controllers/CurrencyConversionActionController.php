<?php
declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\CurrencyConversion\Http\Requests\CurrencyConversionPostRequest;
use Modules\CurrencyConversion\Http\Services\Interfaces\ICurrencyConversionService;
use Modules\CurrencyConversion\Transformers\CurrencyConversionPostResource;

class CurrencyConversionActionController extends Controller
{
    public function __invoke(CurrencyConversionPostRequest $request, ICurrencyConversionService $currencyConversionService): CurrencyConversionPostResource
    {
        return new CurrencyConversionPostResource(
            $currencyConversionService->getCurrencies(
                $request->toDto()
            )
        );
    }
}
