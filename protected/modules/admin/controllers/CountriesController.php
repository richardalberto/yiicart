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

}