<?php

/**
 * This is the model class for table "attribute_group_description".
 *
 * The followings are the available columns in table 'attribute_group_description':
 * @property integer $attribute_group_id
 * @property integer $language_id
 * @property string $name
 */
class AttributeGroupDescription extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AttributeGroupDescription the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'attribute_group_description';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('attribute_group_id, language_id, name', 'required'),
            array('attribute_group_id, language_id', 'numerical', 'integerOnly' => true),
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
            'attribute_group_id' => 'Attribute Group',
            'language_id' => 'Language',
            'name' => 'Name',
        );
    }

}