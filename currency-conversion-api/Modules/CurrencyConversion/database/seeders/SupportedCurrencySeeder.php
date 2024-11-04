<?php

namespace Modules\CurrencyConversion\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class SupportedCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('module-command:supported-fixer-exchange-rate');
    }
}
