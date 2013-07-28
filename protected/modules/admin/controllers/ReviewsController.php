<?php

class ReviewsController extends BackendController {

    public function actionIndex() {
        $reviews = Review::model()->findAll();
        
        $this->render('index', array(
            'reviews'=>$reviews            
        ));
    }

}