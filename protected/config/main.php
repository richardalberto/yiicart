<?php

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
    require(dirname(__FILE__) . '/../../config.php'), 
    array(
        'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
        
        // preloading 'log' component
        'preload' => array('log'),
        
        // autoloading model and component classes
        'import' => array(
            'application.models.*',
            'application.components.*',
        ),
        'modules' => array(
            'admin' => array(
                'class' => 'application.modules.admin.AdminModule',
            ),
            'install' => array(
                'class' => 'application.modules.install.InstallModule',
            )
        ),
        
        // application components
        'components' => array(
            'user' => array(
                'class' => 'CWebUser', 
                'allowAutoLogin' => false,
            ),
            'customer' => array(
                'class' => 'WebCustomer', 
                'allowAutoLogin' => false,
            ),
            'settings' => array(
                'class' => 'SettingsManager'
            ),
            'urlManager' => array(
	            'urlFormat' => 'path',
	            'showScriptName' => false,
	            'rules' => array(
                    '<controller:\w+>/<id:\d+>' => '<controller>/view',
                    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                ),
            ),
            'errorHandler' => array(
                // use 'site/error' action to display errors
                'errorAction' => 'site/error',
            ),
            'log' => array(
                'class' => 'CLogRouter',
                'routes' => array(
                    array(
                        'class' => 'CFileLogRoute',
                        'levels' => 'error, warning',
                    ),
                ),
            ),
        ),
    )
);