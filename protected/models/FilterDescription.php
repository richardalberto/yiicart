<?php

/**
 * This is the model class for table "filter_description".
 *
 * The followings are the available columns in table 'filter_description':
 * @property integer $filter_id
 * @property integer $language_id
 * @property integer $filter_group_id
 * @property string $name
 */
class FilterDescription extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return FilterDescription the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'filter_description';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('filter_id, language_id, filter_group_id, name', 'required'),
            array('filter_id, language_id, filter_group_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 64),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('filter_id, language_id, filter_group_id, name', 'safe', 'on' => 'search'),
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
            'filter_id' => 'Filter',
            'language_id' => 'Language',
            'filter_group_id' => 'Filter Group',
            'name' => 'Name',
        );
    }

}