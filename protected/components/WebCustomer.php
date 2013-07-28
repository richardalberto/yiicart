<?php
class WebCustomer extends CWebUser {
    function getShoppingCart(){
        if(is_null($this->getState('shoppingCart'))){
            $shoppingCart = new ShoppingCart;
            $this->setState('shoppingCart', $shoppingCart);
        }
        else
            $shoppingCart = $this->getState('shoppingCart');
        
        return $shoppingCart;
    }
}
?>
