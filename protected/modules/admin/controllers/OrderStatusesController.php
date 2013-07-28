<?php

class OrderStatusesController extends BackendController {

    public function actionIndex() {
        $orderStatuses = OrderStatus::model()->findAll();
        
        $this->render('index', array(
            'orderStatuses'=>$orderStatuses            
        ));
    }

}