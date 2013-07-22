<?php

/**
 * AttributeGroupForm class.
 * AttributeGroupForm is the data structure for keeping
 * attribute group form data. It is used by the 'create' and 'update' action of 'AttributeGroupsController'.
 */
class AttributeGroupForm extends CFormModel {

    public $id;
    public $name;
    public $sortOrder;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('name', 'required'),
            array('id, sortOrder', 'numerical'),
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
            'sortOrder'=>Yii::t('attributes', 'Sort Order'),
        );
    }
    
    public function loadDataFromAttributeGroup($id){
        $attribute = AttributeGroup::model()->findByPk($id);
        if(!is_null($attribute)){
            $this->id = $attribute->attribute_group_id;
            $this->name = $attribute->description->name;
            $this->sortOrder = $attribute->sort_order;
        }
    }
    
    public function save(){
        $attributeGroup = AttributeGroup::model()->findByPk($this->id);
        if(is_null($attributeGroup)){ // is insert   
            $attributeGroup = new AttributeGroup;
            $attributeGroup->sort_order = $this->sortOrder;
            $attributeGroup->save();
            
            $attributeDescription = new AttributeGroupDescription;
            $attributeDescription->attribute_group_id = $attributeGroup->attribute_group_id;
            $attributeDescription->language_id = 1; // TODO: read locale
            $attributeDescription->name = $this->name;
            $attributeDescription->save();
        }
        else{
            $attributeGroup->sort_order = $this->sortOrder;
            $attributeGroup->save();
            
            $attributeGroup->description->name = $this->name;
            $attributeGroup->description->save();            
        }
    }

}