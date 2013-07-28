<?php

class ReturnActionsController extends BackendController {

    public function actionIndex() {
        $returnActions = ProductReturnAction::model()->findAll();
        
        $this->render('index', array(
            'returnActions'=>$returnActions            
        ));
    }

}