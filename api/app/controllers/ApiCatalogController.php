<?php

use Moa\API\Provider\CatalogProviderInterface;

class APICatalogController extends BaseController {

    protected $_catalogProvider;

    /**
     * @param CatalogProviderInterface $prov
     */
    public function __construct(CatalogProviderInterface $prov) {
        $this->_catalogProvider = $prov;
    }


}