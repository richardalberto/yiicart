<?php

/**
 * This is the model class for table "weight_class".
 *
 * The followings are the available columns in table 'weight_class':
 * @property integer $weight_class_id
 * @property string $value
 */
class WeightClass extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return WeightClass the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'weight_class';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('value', 'length', 'max' => 15),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('weight_class_id, value', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'description' => array(self::HAS_ONE, 'WeightClassDescription', 'weight_class_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'weight_class_id' => 'Weight Class',
            'value' => 'Value',
        );
    }

}