<?php

class ProductController extends APICatalogController {

    /**
     * @method getProduct
     * @param integer $productId
     * @return JSON
     */
    public function getProduct($productId) {
        return $this->_catalogProvider->getProduct($productId);
    }
}