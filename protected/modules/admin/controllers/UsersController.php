<?php

class UsersController extends BackendController {

    public function actionIndex() {
        $users = User::model()->findAll();
        
        $this->render('index', array(
            'users'=>$users            
        ));
    }

    public function actionCreate(){
        $model = new User;
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }

        $statusOptions = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled'),
        );

        $userGroups = CHtml::listData(UserGroup::model()->findAll(), "user_group_id", "name");

        $this->render('create', array(
            'model'=>$model,
            'statusOptions'=>$statusOptions,
            'userGroups'=>$userGroups
        ));
    }

    public function actionUpdate($id){
        $model = User::model()->findByPk($id);
        if(!is_object($model)) {
            throw new CException("Specified user doesn't exists.");
            return;
        }

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }

        $statusOptions = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled'),
        );

        $userGroups = CHtml::listData(UserGroup::model()->findAll(), "user_group_id", "name");

        $this->render('update', array(
            'model'=>$model,
            'statusOptions'=>$statusOptions,
            'userGroups'=>$userGroups
        ));
    }

    public function actionDelete($ids){
        $ids = explode(',', $ids);
        if(count($ids) > 0){
            foreach($ids as $id){
                $user = User::model()->findByPk($id);
                $user->delete();
            }
        }

        $this->redirect(array('index'));
    }

}