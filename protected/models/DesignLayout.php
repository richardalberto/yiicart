<?php

/**
 * This is the model class for table "layout".
 *
 * The followings are the available columns in table 'layout':
 * @property integer $layout_id
 * @property string $name
 */
class DesignLayout extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Layout the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'layout';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('name', 'required'),
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
            'layout_id' => 'Layout',
            'name' => 'Name',
        );
    }

}