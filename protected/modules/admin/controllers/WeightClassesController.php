<?php

class WeightClassesController extends BackendController {

    public function actionIndex() {
        $weightClasses = WeightClass::model()->findAll();
        
        $this->render('index', array(
            'weightClasses'=>$weightClasses            
        ));
    }

}