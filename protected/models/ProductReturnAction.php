<?php

/**
 * This is the model class for table "return_action".
 *
 * The followings are the available columns in table 'return_action':
 * @property integer $return_action_id
 * @property integer $language_id
 * @property string $name
 */
class ProductReturnAction extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductReturnAction the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'return_action';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('name', 'required'),
            array('language_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 64),
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
            'return_action_id' => 'Return Action',
            'language_id' => 'Language',
            'name' => 'Name',
        );
    }

}