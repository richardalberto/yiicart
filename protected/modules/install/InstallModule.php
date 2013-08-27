<?php
class InstallModule extends CWebModule {
    
    public $defaultController='step1';

    public function init() {
        // import the module-level models and components
        $this->setImport(array(
            'install.models.*',
            'install.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        }
        else
            return false;
    }

}
