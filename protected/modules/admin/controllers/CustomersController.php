<?php

class CustomersController extends BackendController {

    public function actionIndex() {
        $customers = Customer::model()->findAll();
        
        $this->render('index', array(
            'customers'=>$customers            
        ));
    }

}