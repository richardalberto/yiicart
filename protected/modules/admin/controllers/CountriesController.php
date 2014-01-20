<?php

class CountriesController extends BackendController {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $count = Country::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = Yii::app()->settings->getValue('config_admin_limit');
        $pages->applyLimit($criteria);
        $countries = Country::model()->findAll($criteria);

        $this->render('index', array(
            'countries' => $countries,
            'pages' => $pages            
        ));
    }

    public function actionCreate(){
        $model = new Country;
        if (isset($_POST['Country'])) {
            $model->attributes = $_POST['Country'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }

        $statusOptions = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled'),
        );

        $yesNoOptions = array(
            0=>Yii::t('common', 'No'),
            1=>Yii::t('common', 'Yes')
        );

        $this->render('create', array(
            'model'=>$model,
            'statusOptions'=>$statusOptions,
            'yesNoOptions'=>$yesNoOptions
        ));
    }

    public function actionUpdate($id){
        $model = Country::model()->findByPk($id);
        if(!is_object($model)) {
            throw new CException("Specified country doesn't exists.");
            return;
        }

        if (isset($_POST['Country'])) {
            $model->attributes = $_POST['Country'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }

        $statusOptions = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled'),
        );

        $yesNoOptions = array(
            0=>Yii::t('common', 'No'),
            1=>Yii::t('common', 'Yes')
        );

        $this->render('update', array(
            'model'=>$model,
            'statusOptions'=>$statusOptions,
            'yesNoOptions'=>$yesNoOptions
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