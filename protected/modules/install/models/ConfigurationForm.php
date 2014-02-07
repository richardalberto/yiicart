<?php

/**
 * ConfigurationForm class.
 * ConfigurationForm is the data structure for keeping
 * configuration form data. It is used by the 'index' action of 'Step3Controller'.
 */
class ConfigurationForm extends CFormModel {

    public $dbDriver = 'mysql';
    public $dbHost = 'localhost';
    public $dbUser;
    public $dbPassword;
    public $dbName;
    public $dbPrefix = 'yc_';
    public $username = 'admin';
    public $password;
    public $email;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('dbDriver, dbHost, dbUser, dbName, username, password, email', 'required'),
            array('dbPassword, dbPrefix', 'safe'),
            array('dbDriver', 'validateDbConnection'),
        );
    }

    /**
     * Declares customized attribute labels.
     */
    public function attributeLabels() {
        return array(
            'dbDriver' => Yii::t('configuration', 'Database Driver'),
            'dbHost' => Yii::t('configuration', 'Database Host'),
            'dbUser' => Yii::t('configuration', 'User'),
            'dbPassword' => Yii::t('configuration', 'Password'),
            'dbName' => Yii::t('configuration', 'Database Name'),
            'dbPrefix' => Yii::t('configuration', 'Database Prefix'),
            'username' => Yii::t('configuration', 'Username'),
            'password' => Yii::t('configuration', 'Password'),
            'email' => Yii::t('configuration', 'E-Mail'),
        );
    }

    public function validateDbConnection() {
        if (!$this->hasErrors()) {
            try {
                $connection = new CDbConnection("{$this->dbDriver}:host={$this->dbHost};dbname={$this->dbName}", $this->dbUser, $this->dbPassword);
                $connection->active = true;
            } catch (Exception $ex) {
                $this->addError('dbDriver', $ex->getMessage());
            }
        }
    }

    public function save() {
        return ($this->saveConfigFile() && $this->runDbScript());
    }

    private function runDbScript() {
        try {
            $connection = new CDbConnection("{$this->dbDriver}:host={$this->dbHost};dbname={$this->dbName}", $this->dbUser, $this->dbPassword);
            $connection->active = true;

            $sqlFile = Yii::getPathOfAlias('webroot.protected.data') . '/schema.mysql.sql';
            $sql = file_get_contents($sqlFile);
            $connection->beginTransaction();
            $connection->createCommand("SET CHARACTER SET utf8")->execute();
            $command = $connection->createCommand($sql);
            $command->execute(array(
                ':username' => $this->username,
                ':salt' => $salt = substr(md5(uniqid(rand(), true)), 0, 9),
                ':password' => sha1($salt . sha1($salt . sha1($this->password))),
                ':email' => $this->email
            ));
            
            $connection->getCurrentTransaction()->commit();
            $connection->active = false;
            return true;
        }
        catch (Exception $ex){
            return false;
        }
    }

    private function saveConfigFile() {
        $imagePath = Yii::getPathOfAlias('webroot.image') . '/';
        $config[] = "<?php
            // This is the main YiiCart configuration.
            return array(
                'installed' => true,
                'name' => 'Yii Cart',
                'language'=>'en',
                'theme'=>'classic',

                // application components
                'components' => array(
                    'db' => array(
                        'connectionString' => 'mysql:host={$this->dbHost};dbname={$this->dbName}',
                        'emulatePrepare' => true,
                        'username' => '{$this->dbUser}',
                        'password' => '{$this->dbPassword}',
                        'charset' => 'utf8',
                    ),
                ),
                
                // global params
                'params' => array(
                    'imagePath' => '{$imagePath}',
                ),
            );
            ?>";
        return file_put_contents(Yii::getPathOfAlias('webroot') . '/config.php', $config);
    }

}