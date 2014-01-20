<?php

/**
 * This is the model class for table "length_class".
 *
 * The followings are the available columns in table 'length_class':
 * @property integer $length_class_id
 * @property string $value
 */
class LengthClass extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return LengthClass the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'length_class';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('value', 'required'),
            array('value', 'length', 'max' => 15),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'description' => array(self::HAS_ONE, 'LengthClassDescription', 'length_class_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'length_class_id' => 'Length Class',
            'value' => 'Value',
        );
    }

}