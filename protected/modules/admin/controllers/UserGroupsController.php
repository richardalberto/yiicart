<?php

class UserGroupsController extends BackendController {

    public function actionIndex() {
        $groups = UserGroup::model()->findAll();
        
        $this->render('index', array(
            'groups'=>$groups            
        ));
    }

}