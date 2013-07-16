<?php

class ProductController extends Controller {

    public function actionView($id) {
        $product = Product::model()->findByPk($id);
        if(is_null($product)) 
            die('Invalid product');
        
        $this->render('index', array(
            'product'=>$product,
        ));
    }

}