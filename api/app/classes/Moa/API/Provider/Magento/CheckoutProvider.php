<?php
namespace Moa\API\Provider\Magento;

use Moa\API\Provider\CheckoutProviderInterface;

/**
 * Magento API provider for Laravel
 *
 * @author Raja Kapur <raja.kapur@gmail.com>
 * @author Adam Timberlake <adam.timberlake@gmail.com>
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
        $response = $this->_apiClient->get($this->getProviderUrl('cart/add/'.$productId.'/'.$quantity));
        return $response->json();
    }

    /**
     * @method removeCartItem
     * @param int $id
     * @return array
     */
    public function removeCartItem($id)
    {

    }

    /**
     * @method getCartItems
     * @return array
     */
    public function getCartItems()
    {
        $response = $this->_apiClient->get($this->getProviderUrl('cart'));
        return $response->json();
    }


}