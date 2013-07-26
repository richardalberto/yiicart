<?php

class CategoryController extends Controller {
    
    public $layout='//layouts/column2';

    public function actionView($id) {
        $category = Category::model()->findByPk($id);
        if(is_null($category)) 
            die('Invalid category');
        
        $this->render('index', array(
            'products'=>$category->activeProducts,
        ));
    }

}