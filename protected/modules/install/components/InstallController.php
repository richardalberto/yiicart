<?php
/**
 * Controller is the customized base controller class for the installer module.
 * All controller classes for this module should extend from this base class.
 */
class InstallController extends CController
{
	/**
	 * @var string the default layout for the controller view. 
	 */
	public $layout='/layouts/main';
        
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function init()
    {
        // Check if system is installed
        if(Yii::app()->isInstalled()) {
            $this->redirect(array("/site/index"));
        }
    }
}