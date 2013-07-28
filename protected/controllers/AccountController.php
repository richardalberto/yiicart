<?php

class AccountController extends Controller {

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        if(!Yii::app()->customer->isGuest)
            $this->render('index');
        else
            $this->redirect('site/login');
    }

}