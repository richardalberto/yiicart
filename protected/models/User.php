<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $user_id
 * @property integer $user_group_id
 * @property string $username
 * @property string $password
 * @property string $salt
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $code
 * @property string $ip
 * @property integer $status
 * @property string $date_added
 */
class User extends CActiveRecord {
    
    const STATUS_PENDING = 0;
    const STATUS_APPROVED = 1;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'user';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('user_group_id, username, password, salt, firstname, lastname, email, code, ip, status', 'required'),
            array('user_group_id, status', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 20),
            array('password, code, ip', 'length', 'max' => 40),
            array('salt', 'length', 'max' => 9),
            array('firstname, lastname', 'length', 'max' => 32),
            array('email', 'length', 'max' => 96),
            array('date_added', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'user_id' => 'User',
            'user_group_id' => 'User Group',
            'username' => 'Username',
            'password' => 'Password',
            'salt' => 'Salt',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'code' => 'Code',
            'ip' => 'Ip',
            'status' => 'Status',
            'date_added' => 'Date Added',
        );
    }
    
    public function getStatus(){
        if($this->status == self::STATUS_PENDING)
            return Yii::t('common', 'Disabled');
        else
            return Yii::t('common', 'Enabled');
    }
    
    public function getDateAdded($withTime = false){
        if($withTime)
            return date('Y-m-d h:i:s', strtotime($this->date_added));
        else
            return date('Y-m-d', strtotime($this->date_added));
    }
    
    public static function encryptPassword($password, $salt) {
        return sha1($salt . sha1($salt . sha1($password)));
    }

}