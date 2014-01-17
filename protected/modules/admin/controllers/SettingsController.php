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
        
        $directories = glob(Yii::getPathOfAlias('webroot.themes'), GLOB_ONLYDIR);
        $themes = array();
        foreach ($directories as $directory) {
                $themes[] = basename($directory);
        }
        
        $layouts = CHtml::listData(Layout::model()->findAll(), 'layout_id', 'name');
        
        $countries = CHtml::listData(Country::model()->findAll(), 'country_id', 'name');
        
        $zones = CHtml::listData(Zone::model()->findAll(array('country_id'=>$model->country)), 'zone_id', 'name');
        
        $languages = CHtml::listData(Language::model()->findAll(), 'language_id', 'name');
        
        $currencies = CHtml::listData(Currency::model()->findAll(), 'currency_id', 'title');
        
        $autoUpdateCurrencyOptions = array(
            0=>Yii::t('settings', 'No'),
            1=>Yii::t('settings', 'Yes')
        );
        
        $this->render('create', array(
            'model'=>$model,
            'themes'=>$themes,
            'layouts'=>$layouts,
            'countries'=>$countries,
            'zones'=>$zones,
            'languages'=>$languages,
            'currencies'=>$currencies,
            'autoUpdateCurrencyOptions'=>$autoUpdateCurrencyOptions
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
        
        $directories = glob(Yii::getPathOfAlias('webroot.themes') . "/*", GLOB_ONLYDIR);
        $themes = array();
        foreach ($directories as $directory) {
                $themes[] = basename($directory);
        }
        
        $layouts = CHtml::listData(Layout::model()->findAll(), 'layout_id', 'name');
        
        $countries = CHtml::listData(Country::model()->findAll(), 'country_id', 'name');
        
        $zones = CHtml::listData(Zone::model()->findAllByAttributes(array('country_id'=>$model->country)), 'zone_id', 'name');
        
        $languages = CHtml::listData(Language::model()->findAll(), 'language_id', 'name');
        
        $currencies = CHtml::listData(Currency::model()->findAll(), 'currency_id', 'title');
        
        $autoUpdateCurrencyOptions = array(
            0=>Yii::t('settings', 'No'),
            1=>Yii::t('settings', 'Yes')
        );
        
        $this->render('update', array(
            'model'=>$model,
            'themes'=>$themes,
            'layouts'=>$layouts,
            'countries'=>$countries,
            'zones'=>$zones,
            'languages'=>$languages,
            'currencies' =>$currencies,
            'autoUpdateCurrencyOptions'=>$autoUpdateCurrencyOptions
        ));        
    }

}