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
        if (isset($_POST['ManufacturerForm'])) {
            $model->attributes = $_POST['ManufacturerForm'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            }
        }
        
        $this->render('create', array(
            'model'=>$model
        ));
    }
    
    public function actionUpdate($id){
        $model = new ManufacturerForm;
        if (isset($_POST['ManufacturerForm'])) {
            $model->attributes = $_POST['ManufacturerForm'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            }
        }
        else
            $model->loadDataFromManufacturer($id);
        
        $this->render('update', array(
            'model'=>$model
        ));        
    }
    
    public function actionDelete($ids){
        $ids = explode(',', $ids);
        if(count($ids) > 0){
            foreach($ids as $id){
                $manufacturer = Manufacturer::model()->findByPk($id);
                $manufacturer->delete();
            }
        }
        
        $this->redirect(array('index'));
    }
    
    public function actionAutocomplete($query){
        $json = array();
        
        $manufacturers = Manufacturer::model()->findAll("name LIKE '%{$query}%' ");
        foreach($manufacturers as $manufacturer){
            $json[] = array('id'=>$manufacturer->manufacturer_id, 'value'=>$manufacturer->name);
        }
        
        echo CJSON::encode($json);
    }
}