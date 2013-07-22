<?php

/**
 * This is the model class for table "filter".
 *
 * The followings are the available columns in table 'filter':
 * @property integer $filter_id
 * @property integer $filter_group_id
 * @property integer $sort_order
 */
class Filter extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Filter the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'filter';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('filter_group_id, sort_order', 'required'),
            array('filter_group_id, sort_order', 'numerical', 'integerOnly' => true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'description' => array(self::HAS_ONE, 'FilterDescription', 'filter_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'filter_id' => 'Filter',
            'filter_group_id' => 'Filter Group',
            'sort_order' => 'Sort Order',
        );
    }

}