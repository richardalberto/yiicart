<?php

class CustomerBanIPController extends BackendController {

    public function actionIndex() {
        $ips = CustomerBanIP::model()->findAll();
        
        $this->render('index', array(
            'ips'=>$ips            
        ));
    }

}