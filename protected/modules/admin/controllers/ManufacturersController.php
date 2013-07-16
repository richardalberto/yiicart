<?php

class ManufacturersController extends BackendController {

    public function actionIndex() {
        $manufacturers = Manufacturer::model()->findAll();
        
        $this->render('index', array(
            'manufacturers'=>$manufacturers            
        ));
    }

}