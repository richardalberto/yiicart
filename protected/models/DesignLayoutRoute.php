<?php

/**
 * This is the model class for table "layout_route".
 *
 * The followings are the available columns in table 'layout_route':
 * @property integer $layout_route_id
 * @property integer $layout_id
 * @property integer $store_id
 * @property string $route
 */
class DesignLayoutRoute extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return LayoutRoute the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'layout_route';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('layout_id, store_id, route', 'required'),
            array('layout_id, store_id', 'numerical', 'integerOnly' => true),
            array('route', 'length', 'max' => 255),
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
            'layout_route_id' => 'Layout Route',
            'layout_id' => 'Layout',
            'store_id' => 'Store',
            'route' => 'Route',
        );
    }

}