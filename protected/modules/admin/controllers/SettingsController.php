<?php

class SettingsController extends BackendController {

    public function actionIndex() {
        $stores = Store::model()->findAll();
        
        $this->render('index', array(
            'stores'=>$stores            
        ));
    }
    
    public function actionCreate(){
        $model = new SettingsForm;
        if (isset($_POST['SettingsForm'])) {
            $model->attributes = $_POST['SettingsForm'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            }
        }
        
        $this->render('create', array(
            'model'=>$model,
        ));
    }
    
    public function actionUpdate($id){
        $model = new SettingsForm;
        if (isset($_POST['SettingsForm'])) {
            $model->attributes = $_POST['SettingsForm'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            }
        }
        else
            $model->loadDataFromStore($id);
        
        $this->render('update', array(
            'model'=>$model,
        ));        
    }

}