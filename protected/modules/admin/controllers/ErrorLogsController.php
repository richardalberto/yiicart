<?php

class ErrorLogsController extends BackendController {

    public function actionIndex() {
        // TODO: set error log to this file
        $file = Yii::app()->settings->getValue('config_error_filename');

        if (file_exists($file)) {
            $logs = file_get_contents($file, FILE_USE_INCLUDE_PATH, null);
        } else {
            $logs = '';
        }
        
        $this->render('index', array(
            'logs'=>$logs
        ));
    }

}