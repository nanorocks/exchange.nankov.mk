<?php

namespace Modules\CurrencyConversion\Console;

use Illuminate\Console\Command;
use Modules\CurrencyConversion\Http\Services\Interfaces\ICurrencyConversionService;

class SupportedFixerExchangeRateCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'module-command:supported-fixer-exchange-rate';

    /**
     * The console command description.
     */
    protected $description = 'Sync currency conversion rates';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currencyConversionService = resolve(ICurrencyConversionService::class);

        $currencyConversionService->syncSupportedFixerExchangeRate();
    }

}
