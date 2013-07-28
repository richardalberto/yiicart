<?php

class UsersController extends BackendController {

    public function actionIndex() {
        $users = User::model()->findAll();
        
        $this->render('index', array(
            'users'=>$users            
        ));
    }

}