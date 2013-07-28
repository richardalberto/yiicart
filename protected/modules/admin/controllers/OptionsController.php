<?php

class optionsController extends BackendController {

    public function actionIndex() {
        $options = Option::model()->findAll();
        
        $this->render('index', array(
            'options'=>$options            
        ));
    }

}