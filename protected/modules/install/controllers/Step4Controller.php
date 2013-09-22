<?php
class Step4Controller extends InstallController {    

    public function actionIndex() {
        $license = file_get_contents(Yii::getPathOfAlias('webroot') . '/LICENSE');
        $this->render('index', array(
            'license'=>$license,
        ));
    }
}
?>
