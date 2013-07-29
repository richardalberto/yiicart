<?php

class LengthClassesController extends BackendController {

    public function actionIndex() {
        $lengthClasses = LengthClass::model()->findAll();
        
        $this->render('index', array(
            'lengthClasses'=>$lengthClasses            
        ));
    }

}