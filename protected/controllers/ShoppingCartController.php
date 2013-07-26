<?php

class ShoppingCartController extends Controller {

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $shoppingCart = Yii::app()->user->getShoppingCart();
        $this->render('index', array(
            'shoppingCart'=>$shoppingCart            
        ));
    }
    
    public function actionAdd(){
        if(isset($_POST['product_id']) && isset($_POST['quantity'])){
            $shoppingCart = Yii::app()->user->getShoppingCart();
            $shoppingCart->add($_POST['product_id'], $_POST['quantity']);
            
            echo CJSON::encode(array('success'=>Yii::t('shoppingcart', '<b>Success:</b> You have added <a href="' . Yii::app()->createUrl('/product/view', array('id'=>$_POST['product_id'])) . '">iPhone</a> to your <a href="' . Yii::app()->createUrl('/shoppingCart') . '">shopping cart</a>!')));
        }
    }

}