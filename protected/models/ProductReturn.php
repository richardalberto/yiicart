<?php

/**
 * This is the model class for table "return".
 *
 * The followings are the available columns in table 'return':
 * @property integer $return_id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $customer_id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $telephone
 * @property string $product
 * @property string $model
 * @property integer $quantity
 * @property integer $opened
 * @property integer $return_reason_id
 * @property integer $return_action_id
 * @property integer $return_status_id
 * @property string $comment
 * @property string $date_ordered
 * @property string $date_added
 * @property string $date_modified
 */
class ProductReturn extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductReturn the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'return';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('order_id, product_id, customer_id, firstname, lastname, email, telephone, product, model, quantity, opened, return_reason_id, return_action_id, return_status_id, date_ordered, date_added, date_modified', 'required'),
            array('order_id, product_id, customer_id, quantity, opened, return_reason_id, return_action_id, return_status_id', 'numerical', 'integerOnly' => true),
            array('firstname, lastname, telephone', 'length', 'max' => 32),
            array('email', 'length', 'max' => 96),
            array('product', 'length', 'max' => 255),
            array('model', 'length', 'max' => 64),
            array('comment', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
            'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'return_id' => 'Return',
            'order_id' => 'Order',
            'product_id' => 'Product',
            'customer_id' => 'Customer',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'product' => 'Product',
            'model' => 'Model',
            'quantity' => 'Quantity',
            'opened' => 'Opened',
            'return_reason_id' => 'Return Reason',
            'return_action_id' => 'Return Action',
            'return_status_id' => 'Return Status',
            'comment' => 'Comment',
            'date_ordered' => 'Date Ordered',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        );
    }

}