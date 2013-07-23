<?php

class OrdersController extends BackendController {

    public function actionView($id) {
        $order = Category::model()->findAllByPk($id);
        
        $this->render('view', array(
            'order'=>$order            
        ));
    }

}