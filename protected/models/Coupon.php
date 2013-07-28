<?php

/**
 * This is the model class for table "coupon".
 *
 * The followings are the available columns in table 'coupon':
 * @property integer $coupon_id
 * @property string $name
 * @property string $code
 * @property string $type
 * @property string $discount
 * @property integer $logged
 * @property integer $shipping
 * @property string $total
 * @property string $date_start
 * @property string $date_end
 * @property integer $uses_total
 * @property string $uses_customer
 * @property integer $status
 * @property string $date_added
 */
class Coupon extends CActiveRecord {
    const STATUS_DISABLED = 0;
    const STATUS_ENABLED = 1;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Coupon the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'coupon';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('name, code, type, discount, logged, shipping, total, uses_total, uses_customer, status', 'required'),
            array('logged, shipping, uses_total, status', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            array('code', 'length', 'max' => 10),
            array('type', 'length', 'max' => 1),
            array('discount, total', 'length', 'max' => 15),
            array('uses_customer', 'length', 'max' => 11),
            array('date_start, date_end, date_added', 'safe'),
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
            'coupon_id' => 'Coupon',
            'name' => 'Name',
            'code' => 'Code',
            'type' => 'Type',
            'discount' => 'Discount',
            'logged' => 'Logged',
            'shipping' => 'Shipping',
            'total' => 'Total',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
            'uses_total' => 'Uses Total',
            'uses_customer' => 'Uses Customer',
            'status' => 'Status',
            'date_added' => 'Date Added',
        );
    }
    
    public function getStatus() {
        if ($this->status == self::STATUS_DISABLED)
            return Yii::t('common', 'Disabled');
        else
            return Yii::t('common', 'Enabled');
    }
    
    public function getDateStart($withTime = false){
        if($withTime)
            return date('Y-m-d h:i:s', strtotime($this->date_start));
        else
            return date('Y-m-d', strtotime($this->date_start));
    }
    
    public function getDateEnd($withTime = false){
        if($withTime)
            return date('Y-m-d h:i:s', strtotime($this->date_end));
        else
            return date('Y-m-d', strtotime($this->date_end));
    }

}