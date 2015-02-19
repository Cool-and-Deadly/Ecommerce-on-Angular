<?php
namespace Moa\API\Provider;

/**
 * Provider Checkout Interface for Laravel
 *
 * @author Ruzbeh Resaei <ruzbeh.resaei@gmail.com>
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