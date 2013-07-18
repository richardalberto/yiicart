<?php

class LoginController extends BackendController {
    
    public $layout='/layouts/login';

    public function actionIndex() {
        if (!Yii::app()->user->isGuest)
            $this->redirect('default/index');
        else {
            $model = new LoginForm;

            // if it is ajax validation request
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            // collect user input data
            if (isset($_POST['LoginForm'])) {
                $model->attributes = $_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if ($model->validate() && $model->login())
                    $this->redirect('default/index');
            }
            // display the login form
            $this->render('index', array('model' => $model));
        }
    }
}