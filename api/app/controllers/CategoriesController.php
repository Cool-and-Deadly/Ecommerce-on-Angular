<?php

use Moa\API\Provider\CatalogProviderInterface;

class CategoriesController extends BaseAPIController {

    protected $catalogProvider;

    /**
     * @param CatalogProviderInterface $prov
     */
    public function __construct(CatalogProviderInterface $prov) {
        parent::__construct();
        $this->_catalogProvider = $prov;
    }

    /**
     * @method getCategories
     * @return JSON
     */
    public function getCategories() {
        return $this->_catalogProvider->getCategories();
    }

}