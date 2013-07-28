<?php

class SettingsController extends BackendController {

    public function actionIndex() {
        $stores = Store::model()->findAll();
        
        $this->render('index', array(
            'stores'=>$stores            
        ));
    }

}