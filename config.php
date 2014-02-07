<?php
// This is the main YiiCart configuration.
return array(
    'installed' => false,
    'name' => 'Yii Cart',
    'language'=>'en',
    'theme'=>'classic',

    // application components
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yiicart',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
    ),
    
    // global params
    'params' => array(
        'imagePath' => '/var/www/yiicart/image/',
    ),
);
?>
