<?php

class CouponsController extends BackendController {

    public function actionIndex() {
        $coupons = Coupon::model()->findAll();
        
        $this->render('index', array(
            'coupons'=>$coupons            
        ));
    }

}