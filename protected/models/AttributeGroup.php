<?php

/**
 * This is the model class for table "attribute_group".
 *
 * The followings are the available columns in table 'attribute_group':
 * @property integer $attribute_group_id
 * @property integer $sort_order
 */
class AttributeGroup extends CActiveRecord {
    
    private $cacheId;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AttributeGroup the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'attribute_group';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('sort_order', 'required'),
            array('sort_order', 'numerical', 'integerOnly' => true),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'description' => array(self::HAS_ONE, 'AttributeGroupDescription', 'attribute_group_id'),
            'attributes' => array(self::HAS_MANY, 'Attribute', 'attribute_group_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'attribute_group_id' => 'Attribute Group',
            'sort_order' => 'Sort Order',
        );
    }
    
    public function beforeDelete() {
        $this->cacheId = $this->attribute_group_id;
        
        // delete relations
        foreach($this->attributes as $attribute)
            $attribute->delete();
        
        return parent::beforeDelete();
    }

    public function afterDelete() {
        // delete dependencies
        AttributeGroupDescription::model()->deleteAll("attribute_group_id={$this->cacheId}");

        parent::afterDelete();
    }

}