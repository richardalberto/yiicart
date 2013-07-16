<?php

class CategoryController extends Controller {

    public function actionView($id) {
        $category = Category::model()->findByPk($id);
        if(is_null($category)) 
            die('Invalid category');
        
        $this->render('index', array(
            'products'=>$category->activeProducts,
        ));
    }

}