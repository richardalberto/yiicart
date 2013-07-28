<?php

class InformationController extends BackendController {

    public function actionIndex() {
        $informations = Information::model()->findAll();
        
        $this->render('index', array(
            'informations'=>$informations            
        ));
    }

}