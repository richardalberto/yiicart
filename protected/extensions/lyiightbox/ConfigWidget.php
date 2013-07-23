<?php

/**
 * ConfigWidget class file.
 *
 * @author Simone Gentili <sensorario@gmail.com>
 * @version 1.1
 */

/**
 * This widget encapsulates the LightBox2 script for popup images.
 *
 * ({@link https://github.com/sensorario/lyiightbox}).
 *
 * @author Simone Gentili <sensorario@gmail.com>
 */
class ConfigWidget extends CWidget {

    private $scripts = null;
    private $css = null;
    private $assetsFolder = null;
    private $assetsFolderName = 'assets';
    private $baseUrl = null;

    /* @todo: user patter singleton */
    public function __construct() {
        parent::__construct();
    }

    private function populateCssArrayFiles() {
        $this->css = array(
            '/css/lightbox.css'
        );
    }

    private function populateJsarrayScripts() {
        $this->scripts = array(
            '/js/prototype.js',
            '/js/scriptaculous.js?load=effects,builder',
            '/js/lightbox.js',
        );
    }

    private function loadAllJsScript() {
        $this->populateJsarrayScripts();

        Yii::app()->getClientScript()->registerScript('_', 'lyiightboxAssetUrl = "' . (Yii::app()->getAssetManager()->publish($this->assetsFolder)) . '";', CClientScript::POS_HEAD);

        foreach ($this->scripts as $filename)
            Yii::app()->getClientScript()->registerScriptFile($this->baseUrl . $filename, CClientScript::POS_END);
    }

    private function loadAllCssScripts() {
        $this->populateCssArrayFiles();
        foreach ($this->css as $filename)
            Yii::app()->getClientScript()->registerCssFile($this->baseUrl . $filename);
    }

    private function setAssetsFolder() {
        $this->assetsFolder = dirname(__FILE__) . DIRECTORY_SEPARATOR . $this->assetsFolderName;
        $this->baseUrl = CHtml::asset($this->assetsFolder);
    }

    protected function config() {

        $this->setAssetsFolder();
        $this->loadAllJsScript();
        $this->loadAllCssScripts();
    }

}