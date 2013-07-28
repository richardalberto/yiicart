<?php

/**
 * This is the model class for table "zone".
 *
 * The followings are the available columns in table 'zone':
 * @property integer $zone_id
 * @property integer $country_id
 * @property string $name
 * @property string $code
 * @property integer $status
 */
class Zone extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Zone the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'zone';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('country_id, name, code', 'required'),
            array('country_id, status', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 128),
            array('code', 'length', 'max' => 32),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'country' => array(self::BELONGS_TO, 'Country', 'country_id')
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'zone_id' => 'Zone',
            'country_id' => 'Country',
            'name' => 'Name',
            'code' => 'Code',
            'status' => 'Status',
        );
    }

}