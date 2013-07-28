<?php

class LanguagesController extends BackendController {

    public function actionIndex() {
        $languages = Language::model()->findAll();
        
        $this->render('index', array(
            'languages'=>$languages            
        ));
    }

}