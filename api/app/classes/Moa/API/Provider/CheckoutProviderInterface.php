<?php
namespace Moa\API\Provider;

/**
 * Provider Interface for Laravel
 *
 * @author Raja Kapur <raja.kapur@gmail.com>
 */
interface CheckoutProviderInterface {

    /**
     * Start sessions, leave empty if not needed for API provider
     * 
     * @return void
     */
    public function startSession();

    /**
     * @method getCartItems
     * @return array
     */
    public function getCartItems();

    /**
     * @method addCartItem
     * @param int $productId
     * @param int $quantity
     * @return array
     */
    public function addCartItem($productId, $quantity);

    /**
     * @method removeCartItem
     * @param int $id
     * @return array
     */
    public function removeCartItem($id);
    
}