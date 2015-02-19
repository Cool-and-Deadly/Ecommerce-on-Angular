<?php
namespace Moa\Laravel;

use Illuminate\Support\ServiceProvider;

/**
 * Backend store API checkout service provider
 *
 * @author Ruzbeh Resaei <ruzbeh.resaei@gmail.com>
 */
class APICheckoutServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Binds the API provider specified in config.json@moa.api.provider to
     * Moa\API\Provider\CheckoutProviderInterface.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Moa\API\Provider\CheckoutProviderInterface', function($app) {
            $provider = $app['config']->get('moa.api.provider.checkout');
            $config   = $app['config']->get('moa.' . $provider);
            $ns_class = '\Moa\API\Provider\\' . studly_case($provider) . '\CheckoutProvider';

            $api = new $ns_class($config);
            return $api;
        });
    }
}