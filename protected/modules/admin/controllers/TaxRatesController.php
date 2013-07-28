<?php

class TaxRatesController extends BackendController {

    public function actionIndex() {
        $taxRates = TaxRate::model()->findAll();
        
        $this->render('index', array(
            'taxRates'=>$taxRates            
        ));
    }

}