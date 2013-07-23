<?php
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Yii Cart',
    
    'language'=>'en',   
    
    'theme'=>'classic',    
    
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
        )
    ),
    
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yiicart',
            'emulatePrepare' => true,
            'username' => 'username',
            'password' => 'password',
            'charset' => 'utf8',
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
    
    'params' => array(
        'imagePath' => '/var/www/htdocs/iCart/image/',
    ),
);