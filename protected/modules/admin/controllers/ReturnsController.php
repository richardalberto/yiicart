<?php

class ReturnsController extends BackendController {

    public function actionIndex() {
        $returns = ProductReturn::model()->findAll();
        
        $this->render('index', array(
            'returns'=>$returns            
        ));
    }

}