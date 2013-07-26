<?php

/**
 * This is the model class for table "attribute".
 *
 * The followings are the available columns in table 'attribute':
 * @property integer $attribute_id
 * @property integer $attribute_group_id
 * @property integer $sort_order
 */
class Attribute extends CActiveRecord {

    private $cacheId;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Attribute the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'attribute';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('attribute_group_id, sort_order', 'required'),
            array('attribute_group_id, sort_order', 'numerical', 'integerOnly' => true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'description' => array(self::HAS_ONE, 'AttributeDescription', 'attribute_id'),
            'group' => array(self::BELONGS_TO, 'AttributeGroup', 'attribute_group_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'attribute_id' => 'Attribute',
            'attribute_group_id' => 'Attribute Group',
            'sort_order' => 'Sort Order',
        );
    }

    public function beforeDelete() {
        $this->cacheId = $this->attribute_id;
        return parent::beforeDelete();
    }

    public function afterDelete() {
        // delete dependencies
        AttributeDescription::model()->deleteAll("attribute_id={$this->cacheId}");

        parent::afterDelete();
    }
    
    public function getName($includeGroup = false){
        $name = $this->description->name;
        if($includeGroup) 
            $name = "{$this->group->description->name} > {$name}"; 
            
        return $name;
    }

}