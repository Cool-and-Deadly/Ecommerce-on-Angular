<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Moa\API\Provider\CatalogProviderInterface;

class Products extends Command {

    /**
     * @const IMAGE_PATH
     * @type string
     */
    const IMAGE_PATH = '10.10.10.11';

    /**
     * @const PRODUCTS_CACHE_KEY
     * @type string
     */
    const PRODUCTS_CACHE_KEY = 'products';

    /**
     * @property string $name
     * @type string
     */
    protected $name = 'products';

    /**
     * @property string $description
     * @type string
     */
    protected $description = 'Generate a cache of the products in the Magento database.';

    /**
     * @property $api
     * @var Moa\API\Provider\CatalogProviderInterface
     */
    private $api;

    /**
     * @constructor
     * @return \Products
     */
    public function __construct(CatalogProviderInterface $api)
    {
        $this->api = $api;
        parent::__construct();
    }

    /**
     * @method fire
     * @return void
     */
    public function fire()
    {
        ini_set('memory_limit', '2048M');

        if (Cache::get(self::PRODUCTS_CACHE_KEY)) {
            return;
        }

        $log = array($this, 'info');

        $collection = $this->api->getCollectionForCache($log);

        // Cache the results of the collection for 30 days (43200 min).
        Cache::put(self::PRODUCTS_CACHE_KEY, $collection, 43200);
    }

    /**
     * @method getArguments
     * @return array
     */
    protected function getArguments()
    {
        return array();
    }

    /**
     * @method getOptions
     * @return array
     */
    protected function getOptions()
    {
        return array();
    }

}
