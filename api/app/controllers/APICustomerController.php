<?php

use Moa\API\Provider\CustomerProviderInterface;

class APICustomerController extends BaseController {

    protected $_customerProvider;

    /**
     * @param CustomerProviderInterface $prov
     */
    public function __construct(CustomerProviderInterface $prov) {
        $this->_customerProvider = $prov;
    }


}