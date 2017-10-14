<?php

namespace App\Providers;

use App\Services\Rate\RateServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class RateServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @param Request $request
     * @return void
     * @throws \Exception
     */
    public function boot(Request $request)
    {
        $defaultServiceAlias = env('DEFAULT_RATE_SERVICE');

        $serviceAlias = $request->get('service', $defaultServiceAlias);

        $rateServices = require config_path('rateservices.php');

        if (! array_key_exists($serviceAlias, $rateServices)) {
            throw new \Exception('Unknown rate service: ' . $serviceAlias);
        }

        $serviceClass = $rateServices[$serviceAlias];

        $this->app->instance(RateServiceInterface::class, new $serviceClass());
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [RateServiceInterface::class];
    }
}
