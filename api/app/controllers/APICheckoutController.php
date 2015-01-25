<?php

use Moa\API\Provider\CheckoutProviderInterface;

class APICheckoutController extends BaseController {

    protected $_checkoutProvider;

    /**
     * @param CheckoutProviderInterface $prov
     */
    public function __construct(CheckoutProviderInterface $prov) {
        $this->_checkoutProvider = $prov;
    }


}