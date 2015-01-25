<?php

class CategoriesController extends APICatalogController {

    /**
     * @method getCategories
     * @return JSON
     */
    public function getCategories() {
        return $this->_catalogProvider->getCategories();
    }

}