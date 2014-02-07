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
            'connectionString' => 'mysql:host=localhost;dbname=dname',
            'emulatePrepare' => true,
            'username' => 'username',
            'password' => 'password',
            'charset' => 'utf8',
        ),
    ),

    // global params
    'params' => array(
        'imagePath' => '/yiicart/image',
    ),
);
?>