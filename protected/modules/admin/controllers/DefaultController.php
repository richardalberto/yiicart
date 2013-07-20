<?php

class DefaultController extends BackendController {    

    public function actionIndex() {
        if(Yii::app()->user->isGuest)
            $this->redirect(array('/admin/login'));
        else
            $this->render('index');
    }
    
    /**
     * Displays the login page
     */
    public function actionLogin() {
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
                $this->redirect(array('/admin/default/index'));
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }
}