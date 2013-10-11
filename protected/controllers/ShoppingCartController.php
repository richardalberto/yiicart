<?php

class ShoppingCartController extends Controller {

    public $layout = '//layouts/column1';

    public function actionIndex() {
        $shoppingCart = Yii::app()->customer->getShoppingCart();
        $this->render('index', array(
            'shoppingCart' => $shoppingCart
        ));
    }
    
    public function actionCheckout(){
        $shoppingCart = Yii::app()->customer->getShoppingCart();
        
        $this->render('checkout', array(
            'shoppingCart' => $shoppingCart
        ));
    }

    public function actionAdd() {
        if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
            $product = Product::model()->findByPk($_POST['product_id']);
            if (!is_null($product)) {
                $shoppingCart = Yii::app()->customer->getShoppingCart();
                $shoppingCart->add($product->product_id, intval($_POST['quantity']));

                echo CJSON::encode(array(
                    'success' => Yii::t('shoppingcart', '<b>Success:</b> You have added <a href=":urlproduct">:productname</a> to your <a href=":urlcart">shopping cart</a>!', array(
                        ':urlproduct' => Yii::app()->createUrl('/product/view', array('id' => $_POST['product_id'])),
                        ':productname' => $product->description->name,
                        ':urlcart' => Yii::app()->createUrl('/shoppingCart'),
                    )),
                    'total' => Yii::app()->customer->getShoppingCart()->countProducts() . " " . Yii::t('shoppingCart', 'item(s)') . " - " . Yii::app()->customer->getShoppingCart()->getTotalPrice()
                ));
            }
        }
    }
    
    public function actionUpdate($product_id, $quantity){
        $product = Product::model()->findByPk($product_id);
        if (!is_null($product)) {
            $shoppingCart = Yii::app()->customer->getShoppingCart();
            $shoppingCart->add($product->product_id, intval($quantity));

            $this->redirect(array('index'));
        }
    }

}