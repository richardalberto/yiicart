<?php

class CountriesController extends BackendController {

    public function actionIndex() {
        $countries = Country::model()->findAll();
        
        $this->render('index', array(
            'countries'=>$countries            
        ));
    }

}