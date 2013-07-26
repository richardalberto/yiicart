<?php

/**
 * This is the model class for table "product_attribute".
 *
 * The followings are the available columns in table 'product_attribute':
 * @property integer $product_id
 * @property integer $attribute_id
 * @property integer $language_id
 * @property string $text
 */
class ProductAttribute extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductAttribute the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product_attribute';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('product_id, attribute_id, language_id, text', 'required'),
            array('product_id, attribute_id, language_id', 'numerical', 'integerOnly' => true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'attribute' => array(self::BELONGS_TO, 'Attribute', 'attribute_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'product_id' => 'Product',
            'attribute_id' => 'Attribute',
            'language_id' => 'Language',
            'text' => 'Text',
        );
    }

}