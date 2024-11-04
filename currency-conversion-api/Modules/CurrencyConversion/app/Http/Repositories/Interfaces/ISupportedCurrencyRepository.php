<?php

declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Repositories\Interfaces;

interface ISupportedCurrencyRepository
{
    public function create(array $data): bool;
}
