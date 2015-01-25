<?php

use Moa\API\Provider\CatalogProviderInterface;

class ProductController extends BaseAPIController {

    /**
     * @param CatalogProviderInterface $prov
     */
    public function __construct(CatalogProviderInterface $prov) {
        $this->_catalogProvider = $prov;
    }

    /**
     * @method getProduct
     * @param integer $productId
     * @return JSON
     */
    public function getProduct($productId) {
        return $this->_catalogProvider->getProduct($productId);
    }
}