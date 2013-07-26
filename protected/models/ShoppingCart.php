<?php
class ShoppingCart{
    private $_products = array();
    
    public function add($productId, $quantity){
        $this->_products[] = array('product_id'=>$productId, 'quantity'=>$quantity);
    }   
    
    public function findAllProducts(){
        $products = array();
        foreach($this->_products as $p){
            $product = Product::model()->findByPk($p['product_id']);
            if(!is_null($products))
                $products[] = $product;
        }        
        return $products;
    }
}
?>
