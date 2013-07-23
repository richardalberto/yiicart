## YiiCart

YiiCart is based on Open Cart Shopping Cart but built over Yii PHP Framework and Twitter Bootstrap CSS Framework.

## Install

To install restore database found in protected/data/schema.mysql.sql to your local or remote mysql server.

```
mysql -u[user] -p[password] [database] < protected/data/schema.mysql.sql
```

Then, configure to match your system configuration. Configuration file can be found at config.php

```
'db' => array(
    'connectionString' => 'mysql:host=[host];dbname=[dbname]',
    'emulatePrepare' => true,
    'username' => '[username]',
    'password' => '[password]',
    'charset' => 'utf8',
),
....

'params' => array(
    'imagePath' => '/path/to/YiiCart/image/',
),
....
```

## Usage

Frontend may be found at:

```
http://localhost/yiicart/
```

Backend may be found at:

```
http://localhost/yiicart/index.php/admin/
```


## DO NOT USE FOR PRODUCTION !!!

YiiCart is still under development. Please do not use for production.