<?php

declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Dtos;

readonly class CurrencyConversionDto
{
    public function __construct(
        public ?string $source_currency,
        public ?string $target_currency,
        public ?string $value
    )
    {
    }
}
