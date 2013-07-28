<?php

/**
 * This is the model class for table "option".
 *
 * The followings are the available columns in table 'option':
 * @property integer $option_id
 * @property string $type
 * @property integer $sort_order
 */
class Option extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Option the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'option';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('type, sort_order', 'required'),
            array('sort_order', 'numerical', 'integerOnly' => true),
            array('type', 'length', 'max' => 32),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'description' => array(self::HAS_ONE, 'OptionDescription', 'option_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'option_id' => 'Option',
            'type' => 'Type',
            'sort_order' => 'Sort Order',
        );
    }

}