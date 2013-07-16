<?php

/**
 * This is the model class for table "stock_status".
 *
 * The followings are the available columns in table 'stock_status':
 * @property integer $stock_status_id
 * @property integer $language_id
 * @property string $name
 */
class StockStatus extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return StockStatus the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'stock_status';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('language_id, name', 'required'),
            array('language_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 32),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('stock_status_id, language_id, name', 'safe', 'on' => 'search'),
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
            'stock_status_id' => 'Stock Status',
            'language_id' => 'Language',
            'name' => 'Name',
        );
    }

}