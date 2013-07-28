<?php

class StockStatusesController extends BackendController {

    public function actionIndex() {
        $stockStatuses = StockStatus::model()->findAll();
        
        $this->render('index', array(
            'stockStatuses'=>$stockStatuses            
        ));
    }

}