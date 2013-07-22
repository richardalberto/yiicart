<?php

/**
 * This is the model class for table "category_description".
 *
 * The followings are the available columns in table 'category_description':
 * @property integer $category_id
 * @property integer $language_id
 * @property string $name
 * @property string $description
 * @property string $meta_description
 * @property string $meta_keyword
 */
class CategoryDescription extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CategoryDescription the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'category_description';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('category_id, language_id, name', 'required'),
            array('category_id, language_id', 'numerical', 'integerOnly' => true),
            array('name, meta_description, meta_keyword', 'length', 'max' => 255),
            array('description', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'category_id' => 'Category',
            'language_id' => 'Language',
            'name' => 'Name',
            'description' => 'Description',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
        );
    }
    
    public function getName() {
        return CHtml::decode($this->name);
    }

    public function getDescription() {
        return CHtml::decode($this->description);
    }

}