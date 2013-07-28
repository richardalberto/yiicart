<?php

class TaxClassesController extends BackendController {

    public function actionIndex() {
        $taxClasses = TaxClass::model()->findAll();
        
        $this->render('index', array(
            'taxClasses'=>$taxClasses            
        ));
    }

}