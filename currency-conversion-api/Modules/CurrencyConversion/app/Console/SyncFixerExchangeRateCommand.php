<?php

namespace Modules\CurrencyConversion\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class SyncFixerExchangeRateCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'module-command:sync-fixer-exchange-rate';

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
        //

        dd(config('modules.envs.fixer-exchange-rate-currency-api-key'));

        // todo use service to call the API and sync the DB table
    }

    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return [
            ['example', InputArgument::REQUIRED, 'An example argument.'],
        ];
    }

    /**
     * Get the console command options.
     */
    protected function getOptions(): array
    {
        return [
            ['example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null],
        ];
    }
}
