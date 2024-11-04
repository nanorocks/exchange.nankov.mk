<?php
declare(strict_types=1);

namespace Modules\CurrencyConversion\Http\Repositories;

use Carbon\Carbon;
use Modules\CurrencyConversion\Http\Repositories\Interfaces\ISupportedCurrencyRepository;
use Modules\CurrencyConversion\Models\SupportedCurrency;

class SupportedCurrencyRepository implements ISupportedCurrencyRepository
{
    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data): bool
    {
        $now = Carbon::now();

        $dataInsert = array_map(function($key, $value) use ($now) {
            return [
                SupportedCurrency::KEY => $key,
                SupportedCurrency::VALUE => $value,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }, array_keys($data), $data);

        return SupportedCurrency::insert($dataInsert);
    }
}
