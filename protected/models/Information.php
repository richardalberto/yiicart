<?php

/**
 * This is the model class for table "information".
 *
 * The followings are the available columns in table 'information':
 * @property integer $information_id
 * @property integer $bottom
 * @property integer $sort_order
 * @property integer $status
 */
class Information extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Information the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'information';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('bottom, sort_order, status', 'numerical', 'integerOnly' => true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            // TODO: add locale
            'description' => array(self::BELONGS_TO, 'InformationDescription', 'information_id', 'condition'=>'language_id=1'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'information_id' => 'Information',
            'bottom' => 'Bottom',
            'sort_order' => 'Sort Order',
            'status' => 'Status',
        );
    }

}