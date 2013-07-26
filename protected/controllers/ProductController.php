<?php

class ProductController extends Controller {
    
    public $layout='//layouts/column2';
    
    public function actionView($id) {
        $product = Product::model()->findByPk($id);
        if(is_null($product)) 
            die('Invalid product');
        
        $this->render('index', array(
            'product'=>$product,
        ));
    }
    
    public function actionCompare(){
        $this->render('compare', array(
            
        ));
    }

}