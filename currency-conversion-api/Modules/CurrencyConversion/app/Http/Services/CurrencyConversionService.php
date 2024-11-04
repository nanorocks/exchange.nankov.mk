<?php

declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Services;

use Illuminate\Support\Facades\Http;
use JetBrains\PhpStorm\NoReturn;
use Modules\CurrencyConversion\Http\Dtos\CurrencyConversionDto;
use Modules\CurrencyConversion\Http\Repositories\Interfaces\ICurrencyConversionRepository;
use Modules\CurrencyConversion\Http\Repositories\Interfaces\ISupportedCurrencyRepository;
use Modules\CurrencyConversion\Http\Services\Interfaces\ICurrencyConversionService;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

readonly class CurrencyConversionService implements ICurrencyConversionService
{
    public function __construct(
        private ICurrencyConversionRepository $currencyConversionRepository,
        private ISupportedCurrencyRepository $supportedCurrencyRepository
    )
    {
    }

    public function getCurrencyCalculation(CurrencyConversionDto $dto): array
    {
        return $this->currencyConversionRepository->getCurrencyCalculation($dto);
    }

    #[NoReturn]
    public function syncSupportedFixerExchangeRate(): void
    {
        $apiKey = config('modules.envs.fixer-exchange-rate-currency-api-key');
        $apiDomain = config('modules.envs.fixer-exchange-rate-currency-api-domain');

        $apiEndpoint = sprintf('%s/api/symbols?access_key=%s', $apiDomain, $apiKey);

        $response = Http::get($apiEndpoint);

        if(!$response->successful()) {
            throw new BadRequestException($response->getBody()->getContents());
        }

        $json = $response->json();

        $success = $this->supportedCurrencyRepository->create($json['symbols']);

        if(!$success) {
            throw new BadRequestException(
                'Supported currency rates could not be created.'
            );
        }
    }
}
