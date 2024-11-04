<?php

namespace Modules\CurrencyConversion\Tests\Unit;

use Modules\CurrencyConversion\Http\Dtos\CurrencyConversionDto;
use Modules\CurrencyConversion\Http\Services\CurrencyConversionService;
use Tests\TestCase;

class CurrencyConversionServiceTest extends TestCase
{
    public function test_get_currency_calculation()
    {
        $currencyConversionService = resolve(CurrencyConversionService::class);

        // Define different currency conversion scenarios
        $scenarios = [
            ['from' => 'MKD', 'to' => 'USD', 'amount' => 1000, 'expected' => (1000 / 61.606013) * 1.08808],
            ['from' => 'EUR', 'to' => 'AED', 'amount' => 100, 'expected' => 100 * 3.996561],
            ['from' => 'USD', 'to' => 'AFN', 'amount' => 50, 'expected' => (50 / 1.08808) * 72.725294],
            ['from' => 'GBP', 'to' => 'CAD', 'amount' => 200, 'expected' => (200 / 0.842134) * 1.518035],
            ['from' => 'JPY', 'to' => 'CNY', 'amount' => 5000, 'expected' => (5000 / 166.427256) * 7.750069],

            // If you need add other scenarios...
        ];

        foreach ($scenarios as $scenario) {
            $dto = new CurrencyConversionDto($scenario['from'], $scenario['to'], $scenario['amount']);

            // Perform the calculation
            $result = $currencyConversionService->getCurrencyCalculation($dto);

            // Assert the expected structure and calculated value
            $this->assertIsArray($result);
            $this->assertArrayHasKey('from', $result);
            $this->assertArrayHasKey('to', $result);
            $this->assertArrayHasKey('amount', $result);
            $this->assertArrayHasKey('amountCalculated', $result);

            // Additional assertions to verify the correctness of the calculation
            $this->assertEquals($scenario['from'], $result['from']);
            $this->assertEquals($scenario['to'], $result['to']);
            $this->assertEquals($scenario['amount'], $result['amount']);

            // Assert the calculated amount is close to the expected result
            $this->assertEqualsWithDelta($scenario['expected'], $result['amountCalculated'], 0.01);
        }
    }
}
