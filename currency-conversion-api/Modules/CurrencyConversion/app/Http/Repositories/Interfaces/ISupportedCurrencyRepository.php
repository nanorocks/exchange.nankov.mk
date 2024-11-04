<?php

declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ISupportedCurrencyRepository
{
    public function create(array $data): bool;

    public function all(): Collection;
}
