<?php

/**
 * This is the model class for table "return_status".
 *
 * The followings are the available columns in table 'return_status':
 * @property integer $return_status_id
 * @property integer $language_id
 * @property string $name
 */
class ReturnStatus extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ReturnStatus the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'return_status';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('language_id', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>32),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'return_status_id' => 'Return Status',
            'language_id' => 'Language',
            'name' => 'Name',
        );
    }
}