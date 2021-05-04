<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service\CurrencyConversionInterface;
use App\Service\CurrencyConversionServicFloatratese;

class CurrencyConversionAdaterServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(CurrencyConversionInterface::class, function () {
            return new CurrencyConversionServicFloatratese();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
