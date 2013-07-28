<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $customer_id
 * @property integer $store_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property string $fax
 * @property string $password
 * @property string $salt
 * @property string $cart
 * @property string $wishlist
 * @property integer $newsletter
 * @property integer $address_id
 * @property integer $customer_group_id
 * @property string $ip
 * @property integer $status
 * @property integer $approved
 * @property string $token
 * @property string $date_added
 */
class Customer extends CActiveRecord {
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;
    
    const APPROVED_NO = 0;
    const APPROVED_YES = 1;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Customer the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'customer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('firstname, lastname, email, telephone, fax, password, salt, customer_group_id, status, approved, token', 'required'),
            array('store_id, newsletter, address_id, customer_group_id, status, approved', 'numerical', 'integerOnly' => true),
            array('firstname, lastname, telephone, fax', 'length', 'max' => 32),
            array('email', 'length', 'max' => 96),
            array('password, ip', 'length', 'max' => 40),
            array('salt', 'length', 'max' => 9),
            array('token', 'length', 'max' => 255),
            array('cart, wishlist, date_added', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'group' => array(self::BELONGS_TO, 'CustomerGroup', 'customer_group_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'customer_id' => 'Customer',
            'store_id' => 'Store',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'fax' => 'Fax',
            'password' => 'Password',
            'salt' => 'Salt',
            'cart' => 'Cart',
            'wishlist' => 'Wishlist',
            'newsletter' => 'Newsletter',
            'address_id' => 'Address',
            'customer_group_id' => 'Customer Group',
            'ip' => 'Ip',
            'status' => 'Status',
            'approved' => 'Approved',
            'token' => 'Token',
            'date_added' => 'Date Added',
        );
    }

    public function getFullname() {
        return "{$this->firstname} {$this->lastname}";
    }

    public function getStatus() {
        if ($this->status == self::STATUS_DISABLED)
            return Yii::t('common', 'Disabled');
        else
            return Yii::t('common', 'Enabled');
    }
    
    public function getApproved() {
        if ($this->approved == self::APPROVED_NO)
            return Yii::t('common', 'No');
        else
            return Yii::t('common', 'Yes');
    }
    
    public function getDateAdded($withTime = false){
        if($withTime)
            return date('Y-m-d h:i:s', strtotime($this->date_added));
        else
            return date('Y-m-d', strtotime($this->date_added));
    }

}