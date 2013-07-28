<?php

class DesignLayoutsController extends BackendController {

    public function actionIndex() {
        $layouts = DesignLayout::model()->findAll();
        
        $this->render('index', array(
            'layouts'=>$layouts            
        ));
    }

}