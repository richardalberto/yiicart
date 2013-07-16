<?php

class ProductsController extends BackendController {

    public function actionIndex() {
        $products = Product::model()->findAll();
        
        $this->render('index', array(
            'products'=>$products            
        ));
    }

}