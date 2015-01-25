<?php

class CurrenciesController extends APICatalogController {

    /**
     * @method getCurrencies
     * @return JSON
     */
    public function getCurrencies() {
        return $this->_catalogProvider->getCurrencies();
    }

}