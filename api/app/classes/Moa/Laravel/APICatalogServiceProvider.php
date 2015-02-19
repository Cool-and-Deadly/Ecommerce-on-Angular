<?php
namespace Moa\Laravel;

use Illuminate\Support\ServiceProvider;

/**
 * Backend store API catalog service provider
 *
 * @author Ruzbeh Resaei <ruzbeh.resaei@gmail.com>
 */
class APICatalogServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Binds the API provider specified in config.json@moa.api.provider to
     * Moa\API\Provider\CustomerProviderInterface.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Moa\API\Provider\CatalogProviderInterface', function($app) {
            $provider = $app['config']->get('moa.api.provider.catalog');
            $config   = $app['config']->get('moa.' . $provider);
            $ns_class = '\Moa\API\Provider\\' . studly_case($provider) . '\CatalogProvider';

            $api = new $ns_class($config);
            return $api;
        });
    }
}