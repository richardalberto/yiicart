<?php

class ReturnReasonsController extends BackendController {

    public function actionIndex() {
        $returnReasons = ProductReturnReason::model()->findAll();
        
        $this->render('index', array(
            'returnReasons'=>$returnReasons            
        ));
    }

}