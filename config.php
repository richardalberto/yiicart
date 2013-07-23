<?php
// This is the main YiiCart configuration.
return array(
    'name' => 'Yii Cart',
    'language'=>'en',
    'theme'=>'classic',
    
    // application components
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yiicart',
            'emulatePrepare' => true,
            'username' => 'username',
            'password' => 'password',
            'charset' => 'utf8',
        ),
    ),
    
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        'imagePath' => '/var/www/htdocs/YiiCart/image/',
    ),
);