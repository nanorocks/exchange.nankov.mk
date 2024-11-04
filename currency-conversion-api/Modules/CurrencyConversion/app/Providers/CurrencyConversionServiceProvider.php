<?php

namespace Modules\CurrencyConversion\Providers;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Modules\CurrencyConversion\Console\SupportedFixerExchangeRateCommand;
use Modules\CurrencyConversion\Console\SyncFixerExchangeRateCommand;
use Modules\CurrencyConversion\Http\Repositories\CurrencyConversionRepository;
use Modules\CurrencyConversion\Http\Repositories\Interfaces\ICurrencyConversionRepository;
use Modules\CurrencyConversion\Http\Repositories\Interfaces\ISupportedCurrencyRepository;
use Modules\CurrencyConversion\Http\Repositories\SupportedCurrencyRepository;
use Modules\CurrencyConversion\Http\Services\CurrencyConversionService;
use Modules\CurrencyConversion\Http\Services\Interfaces\ICurrencyConversionService;
use Nwidart\Modules\Traits\PathNamespace;

class CurrencyConversionServiceProvider extends ServiceProvider
{
    use PathNamespace;

    protected string $name = 'CurrencyConversion';

    protected string $nameLower = 'currencyconversion';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->name, 'database/migrations'));

        // Bind interfaces, dependency inversion principle
        $this->app->bind(ICurrencyConversionRepository::class, CurrencyConversionRepository::class);
        $this->app->bind(ICurrencyConversionService::class, CurrencyConversionService::class);

        $this->app->bind(ISupportedCurrencyRepository::class, SupportedCurrencyRepository::class);
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
         $this->commands([
             SyncFixerExchangeRateCommand::class,
             SupportedFixerExchangeRateCommand::class
         ]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
         $this->app->booted(function () {
             $schedule = $this->app->make(Schedule::class);
             $schedule->command('module-command:sync-fixer-exchange-rate')->daily();
         });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->nameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->nameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->name, 'lang'), $this->nameLower);
            $this->loadJsonTranslationsFrom(module_path($this->name, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $this->publishes([module_path($this->name, 'config/config.php') => config_path($this->nameLower.'.php')], 'config');
        $this->mergeConfigFrom(module_path($this->name, 'config/config.php'), $this->nameLower);
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->nameLower);
        $sourcePath = module_path($this->name, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->nameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->nameLower);

        $componentNamespace = $this->module_namespace($this->name, $this->app_path(config('modules.paths.generator.component-class.path')));
        Blade::componentNamespace($componentNamespace, $this->nameLower);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->nameLower)) {
                $paths[] = $path.'/modules/'.$this->nameLower;
            }
        }

        return $paths;
    }
}
