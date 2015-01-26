<?php

class CartController extends APICheckoutController {

    /**
     * @method getItems
     * @return string
     */
    public function getItems() {
        return $this->_checkoutProvider->getCartItems();
    }

    /**
     * @method addItem
     * @param int $productId
     * @param int $quantity
     * @return string
     */
    public function addItem($productId, $quantity) {
        return $this->_checkoutProvider->addCartItem($productId, $quantity);
    }

    /**
     * @method removeItem
     * @param int $id
     * @return string
     */
    public function removeItem($id) {
        return $this->_checkoutProvider->removeCartItem($id);
    }

}