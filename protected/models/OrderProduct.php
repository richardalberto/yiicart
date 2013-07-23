<?php

/**
 * This is the model class for table "order_product".
 *
 * The followings are the available columns in table 'order_product':
 * @property integer $order_product_id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $name
 * @property string $model
 * @property integer $quantity
 * @property string $price
 * @property string $total
 * @property string $tax
 * @property integer $reward
 */
class OrderProduct extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return OrderProduct the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'order_product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('order_id, product_id, name, model, quantity, reward', 'required'),
            array('order_id, product_id, quantity, reward', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('model', 'length', 'max' => 64),
            array('price, total, tax', 'length', 'max' => 15),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('order_product_id, order_id, product_id, name, model, quantity, price, total, tax, reward', 'safe', 'on' => 'search'),
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
            'order_product_id' => 'Order Product',
            'order_id' => 'Order',
            'product_id' => 'Product',
            'name' => 'Name',
            'model' => 'Model',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'total' => 'Total',
            'tax' => 'Tax',
            'reward' => 'Reward',
        );
    }
}