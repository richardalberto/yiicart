<?php

class ZonesController extends BackendController {

    public function actionIndex() {
        $zones = Zone::model()->findAll();
        
        $this->render('index', array(
            'zones'=>$zones            
        ));
    }

}