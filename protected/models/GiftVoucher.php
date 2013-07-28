<?php

/**
 * This is the model class for table "voucher".
 *
 * The followings are the available columns in table 'voucher':
 * @property integer $voucher_id
 * @property integer $order_id
 * @property string $code
 * @property string $from_name
 * @property string $from_email
 * @property string $to_name
 * @property string $to_email
 * @property integer $voucher_theme_id
 * @property string $message
 * @property string $amount
 * @property integer $status
 * @property string $date_added
 */
class GiftVoucher extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GiftVoucher the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'voucher';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('order_id, code, from_name, from_email, to_name, to_email, voucher_theme_id, message, amount, status', 'required'),
            array('order_id, voucher_theme_id, status', 'numerical', 'integerOnly' => true),
            array('code', 'length', 'max' => 10),
            array('from_name, to_name', 'length', 'max' => 64),
            array('from_email, to_email', 'length', 'max' => 96),
            array('amount', 'length', 'max' => 15),
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
            'voucher_id' => 'Voucher',
            'order_id' => 'Order',
            'code' => 'Code',
            'from_name' => 'From Name',
            'from_email' => 'From Email',
            'to_name' => 'To Name',
            'to_email' => 'To Email',
            'voucher_theme_id' => 'Voucher Theme',
            'message' => 'Message',
            'amount' => 'Amount',
            'status' => 'Status',
            'date_added' => 'Date Added',
        );
    }

}