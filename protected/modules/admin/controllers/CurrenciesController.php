<?php

class CurrenciesController extends BackendController {

    public function actionIndex() {
        $currencies = Currency::model()->findAll();
        
        $this->render('index', array(
            'currencies'=>$currencies            
        ));
    }

}