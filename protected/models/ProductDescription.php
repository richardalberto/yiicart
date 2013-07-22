<?php

/**
 * This is the model class for table "product_description".
 *
 * The followings are the available columns in table 'product_description':
 * @property integer $product_id
 * @property integer $language_id
 * @property string $name
 * @property string $description
 * @property string $meta_description
 * @property string $meta_keyword
 * @property string $tag
 */
class ProductDescription extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return ProductDescription the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product_description';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_id, language_id, name', 'required'),
            array('product_id, language_id', 'numerical', 'integerOnly' => true),
            array('name, meta_description, meta_keyword', 'length', 'max' => 255),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('product_id, language_id, name, description, meta_description, meta_keyword, tag', 'safe', 'on' => 'search'),
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
            'product_id' => 'Product',
            'language_id' => 'Language',
            'name' => 'Name',
            'description' => 'Description',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
            'tag' => 'Tag',
        );
    }
    
    public function getNameShort($limit = 50){
        $name = strip_tags(CHtml::decode($this->name));
        $short = substr($name, 0, $limit);
        
        return strip_tags($short) . '...';
    }

    public function getDescriptionShort($limit = 255) { // 255 chars
        $description = strip_tags(CHtml::decode($this->description));
        $short = substr($description, 0, $limit);
        
        return strip_tags($short) . '...';
    }
    
    public function getDescription() {
        return CHtml::decode($this->description);
    }

}