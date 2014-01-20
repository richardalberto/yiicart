<?php

class CurrenciesController extends BackendController {

    public function actionIndex() {
        $currencies = Currency::model()->findAll();
        
        $this->render('index', array(
            'currencies'=>$currencies            
        ));
    }

    public function actionCreate(){
        $model = new Currency;
        if (isset($_POST['Currency'])) {
            $model->attributes = $_POST['Currency'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }

        $statusOptions = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled'),
        );

        $this->render('create', array(
            'model'=>$model,
            'statusOptions'=>$statusOptions
        ));
    }

    public function actionUpdate($id){
        $model = Currency::model()->findByPk($id);
        if(!is_object($model)) {
            throw new CException("Specified currency doesn't exists.");
            return;
        }

        if (isset($_POST['Currency'])) {
            $model->attributes = $_POST['Currency'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }

        $statusOptions = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled'),
        );

        $this->render('update', array(
            'model'=>$model,
            'statusOptions'=>$statusOptions,
        ));
    }

    public function actionDelete($ids){
        $ids = explode(',', $ids);
        if(count($ids) > 0){
            foreach($ids as $id){
                $currency = Currency::model()->findByPk($id);
                $currency->delete();
            }
        }

        $this->redirect(array('index'));
    }

}