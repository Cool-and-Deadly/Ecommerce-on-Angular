<?php

class AttributesController extends APICatalogController {

    /**
     * @const PROCESS_COUNTS
     * @type boolean
     * @default true
     */
    const PROCESS_COUNTS = false;

    /**
     * @method getOptions
     * @param  string $attributeName
     * @return JSON
     */
    public function getOptions($attributeName) {
        $response = $this->_catalogProvider->getProductOptions($attributeName, self::PROCESS_COUNTS);
        return $response;
    }

}