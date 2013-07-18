<?php

/**
 * This is the model class for table "weight_class_description".
 *
 * The followings are the available columns in table 'weight_class_description':
 * @property integer $weight_class_id
 * @property integer $language_id
 * @property string $title
 * @property string $unit
 */
class WeightClassDescription extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return WeightClassDescription the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'weight_class_description';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('language_id, title, unit', 'required'),
            array('language_id', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 32),
            array('unit', 'length', 'max' => 4),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('weight_class_id, language_id, title, unit', 'safe', 'on' => 'search'),
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
            'weight_class_id' => 'Weight Class',
            'language_id' => 'Language',
            'title' => 'Title',
            'unit' => 'Unit',
        );
    }

}