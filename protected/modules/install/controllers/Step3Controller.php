<?php

class Step3Controller extends InstallController {

    public function actionIndex() {
        $model = new ConfigurationForm;
        
         // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'configuration-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        
         // collect user input data
        if (isset($_POST['ConfigurationForm'])) {
            $model->attributes = $_POST['ConfigurationForm'];
            
            // validate user input and redirect to the confirm page if valid
            if ($model->validate() && $model->save()) {
                $this->redirect(array('/install/step4'));
            }
        }
        
        // TODO: add addtional drivers
        $dbDrivers = array(
            'mysql' => 'MySQL'
        );

        $this->render('index', array(
            'model' => $model,
            'dbDrivers' => $dbDrivers
        ));
    }

}

?>
