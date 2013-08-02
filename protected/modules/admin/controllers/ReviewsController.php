<?php

class ReviewsController extends BackendController {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $count = Review::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = Yii::app()->settings->getValue('config_admin_limit');
        $pages->applyLimit($criteria);
        $reviews = Review::model()->findAll($criteria);
        
        $this->render('index', array(
            'reviews'=>$reviews,
            'pages'=>$pages
        ));
    }

}