<?php

class ZonesController extends BackendController {

    public function actionIndex() {
        $zones = Zone::model()->findAll();
        
        $this->render('index', array(
            'zones'=>$zones            
        ));
    }

    public function actionCreate(){
        $model = new Zone;
        if (isset($_POST['Zone'])) {
            $model->attributes = $_POST['Zone'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }

        $statusOptions = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled'),
        );

        $countries = CHtml::listData(Country::model()->findAll(), 'country_id', 'name');

        $this->render('create', array(
            'model'=>$model,
            'statusOptions'=>$statusOptions,
            'countries'=>$countries
        ));
    }

    public function actionUpdate($id){
        $model = Zone::model()->findByPk($id);
        if(!is_object($model)) {
            throw new CException("Specified zone doesn't exists.");
            return;
        }

        if (isset($_POST['Zone'])) {
            $model->attributes = $_POST['Zone'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }

        $statusOptions = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled'),
        );

        $countries = CHtml::listData(Country::model()->findAll(), 'country_id', 'name');

        $this->render('update', array(
            'model'=>$model,
            'statusOptions'=>$statusOptions,
            'countries'=>$countries
        ));
    }

    public function actionDelete($ids){
        $ids = explode(',', $ids);
        if(count($ids) > 0){
            foreach($ids as $id){
                $country = Country::model()->findByPk($id);
                $country->delete();
            }
        }

        $this->redirect(array('index'));
    }

}