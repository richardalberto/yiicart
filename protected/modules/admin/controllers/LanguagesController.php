<?php

class LanguagesController extends BackendController {

    public function actionIndex() {
        $languages = Language::model()->findAll();
        
        $this->render('index', array(
            'languages'=>$languages            
        ));
    }

    public function actionCreate(){
        $model = new Language;
        if (isset($_POST['Language'])) {
            $model->attributes = $_POST['Language'];
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
        $model = Language::model()->findByPk($id);
        if(!is_object($model)) {
            throw new CException("Specified language doesn't exists.");
            return;
        }

        if (isset($_POST['Language'])) {
            $model->attributes = $_POST['Language'];
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
                $language = Language::model()->findByPk($id);
                $language->delete();
            }
        }

        $this->redirect(array('index'));
    }

}