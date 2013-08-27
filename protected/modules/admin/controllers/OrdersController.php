<?php

class OrdersController extends BackendController {
    
    public function actionIndex() {
        $orders = Order::model()->findAll();
        
        $this->render('index', array(
            'orders'=>$orders
        ));
    }

    public function actionView($id) {
        $order = Order::model()->findByPk($id);
        if(is_null($order)){
            // TODO: send an error here!
            die();
        }
        
        // TODO: add locale
        $orderStatuses = OrderStatus::model()->findAllByAttributes(array('language_id'=>1));
        $orderStatuses = CHtml::listData($orderStatuses, 'order_status_id', 'name');
        
        $this->render('view', array(
            'order'=>$order,
            'orderHistoryModel'=>new OrderHistory,
            'orderStatuses'=>$orderStatuses
        ));
    }
    
    public function actionDelete($ids){
        $ids = explode(',', $ids);
        if(count($ids) > 0){
            foreach($ids as $id){
                $order = Order::model()->findByPk($id);
                $order->delete();
            }
        }
        
        $this->redirect(array('index'));
    }

}