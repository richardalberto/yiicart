<?php

class ShoppingCartController extends Controller {

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionAdd(){
        if(isset($_POST['product_id']) && isset($_POST['quantity'])){
            
        }
    }

}