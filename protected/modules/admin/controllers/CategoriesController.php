<?php

class CategoriesController extends BackendController {

    public function actionIndex() {
        $criteria = new CDbCriteria;
        $criteria->order = 'category_id, parent_id ASC';
        $categories = Category::model()->findAll($criteria);
        
        $this->render('index', array(
            'categories'=>$categories            
        ));
    }
    
    public function actionCreate(){
        $model = new CategoryForm;
        
        $statues = array(
            0=>Yii::t('common.disabled', 'Disabled'),
            1=>Yii::t('common.enabled', 'Enabled')
        );
        
        $this->render('create', array(
            'model'=>$model,
            'statues'=>$statues
        ));
    }
    
    public function actionUpdate($id){
        $model = new CategoryForm;
        $model->loadDataFromCategory($id);
        
        $statues = array(
            0=>Yii::t('common.disabled', 'Disabled'),
            1=>Yii::t('common.enabled', 'Enabled')
        );
        
        $this->render('update', array(
            'model'=>$model,
            'statues'=>$statues
        ));        
    }
    
    public function actionDelete($id){
        
    }

}