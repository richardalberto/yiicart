<?php

class BannersController extends BackendController {

    public function actionIndex() {
        $banners = Banner::model()->findAll();
        
        $this->render('index', array(
            'banners'=>$banners            
        ));
    }

}