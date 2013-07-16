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

}