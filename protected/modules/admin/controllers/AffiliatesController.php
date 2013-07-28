<?php

class AffiliatesController extends BackendController {

    public function actionIndex() {
        $affiliates = Affiliate::model()->findAll();
        
        $this->render('index', array(
            'affiliates'=>$affiliates            
        ));
    }

}