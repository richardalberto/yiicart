<?php

class ShoppingCart {

    private $_products = array();

    public function add($productId, $quantity) {
        if(!$quantity) 
            $this->remove ($productId);
        else
            $this->_products[$productId] = $quantity;
    }

    public function remove($productId) {
        if (isset($this->_products[$productId]))
            unset($this->_products[$productId]);
    }

    public function getQuantity($productId) {
        if (isset($this->_products[$productId]))
            return $this->_products[$productId];
        else
            return null;
    }

    public function getTotalPriceForProduct($productId, $formatted = true) {
        if (!is_null($this->getQuantity($productId))) {
            $product = $this->findProduct($productId);
            if (!is_null($product)) {
                $total = $product->price * $this->getQuantity($productId);
                if ($formatted) {
                    // TODO: format price according to store settings
                    return "$" . sprintf("%.2f", $total);
                }
                else
                    return $total;
            }
        }

        return 0;
    }

    public function findProduct($productId) {
        $product = Product::model()->findByPk($productId);
        return $product;
    }

    public function findAllProducts() {
        $products = array();
        foreach ($this->_products as $product_id => $quantity) {
            $product = Product::model()->findByPk($product_id);
            if (!is_null($products))
                $products[] = $product;
        }
        return $products;
    }

    public function countProducts() {
        $total = 0;
        foreach($this->_products as $quantity){
            $total += $quantity;
        }
        
        return $total;
    }

    public function getTotalPrice($formatted = true) {
        $total = 0;
        foreach ($this->_products as $productId => $quantity) {
            $total += $this->getTotalPriceForProduct($productId, false);
        }

        if ($formatted)
            return "$" . sprintf("%.2f", $total);
        else
            return $total;
    }

}

?>