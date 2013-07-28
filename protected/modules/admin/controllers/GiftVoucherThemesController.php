<?php

class GiftVoucherThemesController extends BackendController {

    public function actionIndex() {
        $themes = GiftVoucherTheme::model()->findAll();
        
        $this->render('index', array(
            'themes'=>$themes            
        ));
    }

}