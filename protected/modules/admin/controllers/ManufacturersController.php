<?php

class ManufacturersController extends BackendController {

    public function actionIndex() {
        $manufacturers = Manufacturer::model()->findAll();
        
        $this->render('index', array(
            'manufacturers'=>$manufacturers            
        ));
    }
    
    public function actionCreate(){
        $model = new ManufacturerForm;
        
        $this->render('create', array(
            'model'=>$model
        ));
    }
    
    public function actionUpdate($id){
        $model = new ManufacturerForm;
        $model->loadDataFromManufacturer($id);
        
        $this->render('update', array(
            'model'=>$model
        ));        
    }
    
    public function actionDelete($id){
        
    }
}