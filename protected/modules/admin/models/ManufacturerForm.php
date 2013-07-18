<?php

/**
 * ManufacturerForm class.
 * ManufacturerForm is the data structure for keeping
 * manufacturer form data. It is used by the 'create' and 'update' action of 'ManufacturersController'.
 */
class ManufacturerForm extends CFormModel {

    public $name;
    public $stores;
    public $seoKeyword;
    public $image;
    public $sortOrder;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('name', 'required'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'name'=>Yii::t('model.CategoryForm', 'Name'),
            'stores'=>Yii::t('model.CategoryForm', 'Stores'), 
            'seoKeyword'=>Yii::t('model.CategoryForm', 'SEO Keyword'), 
            'image'=>Yii::t('model.CategoryForm', 'Image'),
            'sortOrder'=>Yii::t('model.CategoryForm', 'Sort Order'),
        );
    }
    
    public function loadDataFromManufacturer($id){
        $manufacturer = Manufacturer::model()->findByPk($id);
        if(!is_null($manufacturer)){
            $this->name = $manufacturer->name;
            $this->image = $manufacturer->image;
            $this->sortOrder = $manufacturer->sort_order;
        }
    }

}