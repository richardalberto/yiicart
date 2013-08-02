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
            'reviews' => $reviews,
            'pages' => $pages
        ));
    }

    public function actionCreate() {
        $model = new Review;
        if (isset($_POST['Review'])) {
            $model->attributes = $_POST['Review'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }
        
        $statuses = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled')
        );

        $this->render('create', array(
            'model' => $model,
            'statuses'=>$statuses,
        ));
    }

}