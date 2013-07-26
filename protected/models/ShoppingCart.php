<?php
class ShoppingCart{
    private $_products = array();
    
    public function add($productId, $quantity){
        $this->_products[$productId] = $quantity;
    }   
    
    public function getQuantity($productId){
        if(isset($this->_products[$productId]))
            return $this->_products[$productId];
        else
            return null;
    }
    
    public function getTotalPriceForProduct($productId){
        if(!is_null($this->getQuantity($productId))){
            $product = $this->findProduct($productId);
            if(!is_null($product)){
                // TODO: format price according to store settings
                return "$" . sprintf("%.2f", $product->price * $this->getQuantity($productId));
            }
        }
        
        return 0;
    }
    
    public function findProduct($productId){
        $product = Product::model()->findByPk($productId);            
        return $product;
    }
    
    public function findAllProducts(){
        $products = array();
        foreach($this->_products as $product_id => $quantity){            
            $product = Product::model()->findByPk($product_id);
            if(!is_null($products))
                $products[] = $product;
        }        
        return $products;
    }
}
?>
