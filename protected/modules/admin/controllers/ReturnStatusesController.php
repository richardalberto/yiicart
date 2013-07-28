<?php

class ReturnStatusesController extends BackendController {

    public function actionIndex() {
        $returnStatuses = ProductReturnStatus::model()->findAll();
        
        $this->render('index', array(
            'returnStatuses'=>$returnStatuses            
        ));
    }

}