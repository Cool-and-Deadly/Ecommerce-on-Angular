<?php
namespace Moa\API\Provider\Magento;

use Moa\API\Provider\CheckoutProviderInterface;

/**
 * Magento API checkout provider for Laravel
 *
 * @author Ruzbeh Resaei <ruzbeh.resaei@gmail.com>
 */
class CheckoutProvider extends AbstractProvider implements CheckoutProviderInterface  {


    /**
     * @method addCartItem
     * @param int $productId
     * @param int $quantity
     * @return array
     */
    public function addCartItem($productId, $quantity)
    {
        $response = $this->_apiClient->get( self::MAGE_ROUTE . '/cart/add/'.$productId.'/'.$quantity );
        return $response->json();
    }

    /**
     * @method removeCartItem
     * @param int $productId
     * @return array
     */
    public function removeCartItem($productId)
    {
        $response = $this->_apiClient->get( self::MAGE_ROUTE . '/cart/remove/'.$productId );
        return $response->json();
    }

    /**
     * @method getCartItems
     * @return array
     */
    public function getCartItems()
    {
        $response = $this->_apiClient->get( self::MAGE_ROUTE . '/cart' );
        return $response->json();
    }


}