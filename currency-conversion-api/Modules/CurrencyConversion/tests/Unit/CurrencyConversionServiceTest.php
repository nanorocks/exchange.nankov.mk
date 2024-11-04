<?php

namespace Modules\CurrencyConversion\Tests\Unit;

use Modules\CurrencyConversion\Http\Dtos\CurrencyConversionDto;
use Modules\CurrencyConversion\Http\Repositories\Interfaces\ICurrencyConversionRepository;
use Modules\CurrencyConversion\Http\Repositories\Interfaces\ISupportedCurrencyRepository;
use Modules\CurrencyConversion\Http\Services\CurrencyConversionService;
use Tests\TestCase;
use Modules\CurrencyConversion\Models\Currency;
use Carbon\Carbon;

class CurrencyConversionServiceTest extends TestCase
{
    public function test_get_currency_calculation()
    {
        // Step 1: Mock the ISupportedCurrencyRepository and ICurrencyConversionRepository
        $supportedCurrencyRepository = $this->createMock(ISupportedCurrencyRepository::class);
        $currencyConversionRepository = $this->createMock(ICurrencyConversionRepository::class);

        // Step 2: Create a mock object with a 'json' property
        $mockRates = new Currency();
        $mockRates->json = json_encode([
            'USD' => 1.08808,
            'MKD' => 61.606013,
            'EUR' => 1,
            // Add more rates as needed
        ]);

        // Step 3: Configure the currencyConversionRepository mock to return the mock object
        $currencyConversionRepository->method('lastRates')->willReturn($mockRates);

        // Step 4: Instantiate the CurrencyConversionService with the mocked repositories
        $currencyConversionService = new CurrencyConversionService(
            $supportedCurrencyRepository,
            $currencyConversionRepository
        );

        // Step 5: Define the conversion details and expected result
        $dto = new CurrencyConversionDto('MKD', 'USD', 1000);  // Convert 1000 MKD to USD
        $expectedAmountCalculated = (1000 / 61.606013) * 1.08808;

        // Step 6: Call the getCurrencyCalculation method and capture the result
        $result = $currencyConversionService->getCurrencyCalculation($dto);

        // Step 7: Assertions
        $this->assertIsArray($result);  // Ensure the result is an array
        $this->assertArrayHasKey('from', $result);
        $this->assertArrayHasKey('to', $result);
        $this->assertArrayHasKey('amount', $result);
        $this->assertArrayHasKey('amountCalculated', $result);

        // Check specific values in the result
        $this->assertEquals('MKD', $result['from']);
        $this->assertEquals('USD', $result['to']);
        $this->assertEquals(1000, $result['amount']);
        $this->assertEqualsWithDelta($expectedAmountCalculated, $result['amountCalculated'], 0.01);
    }
}
