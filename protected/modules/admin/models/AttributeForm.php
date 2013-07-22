<?php

/**
 * AttributeForm class.
 * AttributeForm is the data structure for keeping
 * attribute form data. It is used by the 'create' and 'update' action of 'AttributeController'.
 */
class AttributeForm extends CFormModel {

    public $id;
    public $name;
    public $group;
    public $sortOrder;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('name', 'required'),
            array('id, sortOrder, group', 'numerical'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'name'=>Yii::t('attributes', 'Name'),
            'group'=>Yii::t('attributes', 'Group'),
            'sortOrder'=>Yii::t('attributes', 'Sort Order'),
        );
    }
    
    public function loadDataFromAttribute($id){
        $attribute = Attribute::model()->findByPk($id);
        if(!is_null($attribute)){
            $this->id = $attribute->attribute_id;
            $this->name = $attribute->description->name;
            $this->group = $attribute->attribute_group_id;
            $this->sortOrder = $attribute->sort_order;
        }
    }
    
    public function save(){
        $attribute = Attribute::model()->findByPk($this->id);
        if(is_null($attribute)){ // is insert   
            $attribute = new Attribute;
            $attribute->attribute_group_id = $this->group;
            $attribute->sort_order = $this->sortOrder;
            $attribute->save();
            
            $attributeDescription = new AttributeDescription;
            $attributeDescription->attribute_id = $attribute->attribute_id;
            $attributeDescription->language_id = 1; // TODO: read locale
            $attributeDescription->name = $this->name;
            $attributeDescription->save();
        }
        else{
            $attribute->attribute_group_id = $this->group;
            $attribute->sort_order = $this->sortOrder;
            $attribute->save();
            
            $attribute->description->name = $this->name;
            $attribute->description->save();            
        }
    }

}