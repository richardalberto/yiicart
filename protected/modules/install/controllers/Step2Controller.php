<?php

class Step2Controller extends InstallController {

    public function actionIndex() {   
        $configFile = Yii::getPathOfAlias('webroot') . '/config.php';
        
        $assetsPath = Yii::getPathOfAlias('webroot.assets') . '/';
        $runtimePath = Yii::getPathOfAlias('webroot.protected.runtime') . '/';
        $imagesPath = Yii::app()->params['imagePath'];
        $imagesDataPath = $imagesPath . 'data/';
        
        $this->render('index', array(
            'configFile'=>$configFile,
            'assetsPath'=>$assetsPath,
            'runtimePath'=>$runtimePath,
            'imagesPath'=>$imagesPath,
            'imagesDataPath'=>$imagesDataPath,
        ));
    }
    
    public function actionValidate() {
        if (phpversion() < '5.0') {
            Yii::app()->user->setFlash('warning', 'Warning: You need to use PHP5 or above for YiiCart to work!');
        }

        if (!ini_get('file_uploads')) {
            Yii::app()->user->setFlash('warning', 'Warning: file_uploads needs to be enabled!');
        }

        if (ini_get('session.auto_start')) {
            Yii::app()->user->setFlash('warning', 'Warning: YiiCart will not work with session.auto_start enabled!');
        }

        if (!extension_loaded('mysql')) {
            Yii::app()->user->setFlash('warning', 'Warning: MySQL extension needs to be loaded for YiiCart to work!');
        }

        if (!extension_loaded('gd')) {
            Yii::app()->user->setFlash('warning', 'Warning: GD extension needs to be loaded for YiiCart to work!');
        }

        if (!extension_loaded('curl')) {
            Yii::app()->user->setFlash('warning', 'Warning: CURL extension needs to be loaded for YiiCart to work!');
        }

        if (!function_exists('mcrypt_encrypt')) {
            Yii::app()->user->setFlash('warning', 'Warning: mCrypt extension needs to be loaded for YiiCart to work!');
        }

        if (!extension_loaded('zlib')) {
            Yii::app()->user->setFlash('warning', 'Warning: ZLIB extension needs to be loaded for YiiCart to work!');
        }

        if (!file_exists(Yii::getPathOfAlias('webroot') . '/config.php')) {
            Yii::app()->user->setFlash('warning', 'Warning: config.php does not exist.');
        } elseif (!is_writable(Yii::getPathOfAlias('webroot') . '/config.php')) {
            Yii::app()->user->setFlash('warning', 'Warning: config.php needs to be writable for YiiCart to be installed!');
        }

        if (!is_writable(Yii::getPathOfAlias('webroot.assets'))) {
            Yii::app()->user->setFlash('warning', 'Warning: Assets directory needs to be writable for YiiCart to work!');
        }

        if (!is_writable(Yii::getPathOfAlias('webroot.protected.runtime'))) {
            Yii::app()->user->setFlash('warning', 'Warning: Runtime directory needs to be writable for YiiCart to work!');
        }

        if (!is_writable(Yii::getPathOfAlias('webroot.image'))) {
            Yii::app()->user->setFlash('warning', 'Warning: Image directory needs to be writable for YiiCart to work!');
        }

        if (!is_writable(Yii::getPathOfAlias('webroot.image.data'))) {
            Yii::app()->user->setFlash('warning', 'Warning: Image data directory needs to be writable for YiiCart to work!');
        }
        
        if(Yii::app()->user->hasFlash('warning')) 
            $this->redirect(array('/install/step2'));
        else
            $this->redirect(array('/install/step3'));
            
    }

}

?>
