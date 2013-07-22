<?php

/**
 * ManufacturerForm class.
 * ManufacturerForm is the data structure for keeping
 * manufacturer form data. It is used by the 'create' and 'update' action of 'ManufacturersController'.
 */
class ManufacturerForm extends CFormModel {

    public $id;
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
            array('id, sortOrder', 'numerical'),
            array('image, seoKeyword, stores', 'safe')
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'name'=>Yii::t('manufacturers', 'Name'),
            'stores'=>Yii::t('manufacturers', 'Stores'), 
            'seoKeyword'=>Yii::t('manufacturers', 'SEO Keyword'), 
            'image'=>Yii::t('manufacturers', 'Image'),
            'sortOrder'=>Yii::t('manufacturers', 'Sort Order'),
        );
    }
    
    public function getManufacturer(){
        if(!is_null($this->id)){
            return Manufacturer::model()->findByPk($this->id);
        }        
        return new Manufacturer;
    }
    
    public function loadDataFromManufacturer($id){
        $manufacturer = Manufacturer::model()->findByPk($id);
        if(!is_null($manufacturer)){
            $this->id = $manufacturer->manufacturer_id;
            $this->name = $manufacturer->name;
            $this->image = $manufacturer->image;
            $this->sortOrder = $manufacturer->sort_order;
            $this->seoKeyword = $manufacturer->getSEOKeyword();
            
            // Stores
            if (isset($manufacturer->stores) && count($manufacturer->stores)) {
                foreach ($manufacturer->stores as $store)
                    $this->stores[$store->store_id] = $store->name;
            }
        }
    }
    
    public function save(){
        $manufacturer = Manufacturer::model()->findByPk($this->id);
        if(is_null($manufacturer)) // is insert   
            $manufacturer = new Manufacturer;
        
        $manufacturer->name = $this->name;
        $manufacturer->image = $this->image;
        $manufacturer->sort_order = $this->sortOrder;        
        $manufacturer->save();
        
        // SEO Keyword
        $manufacturer->updateSEOKeyword($this->seoKeyword);

        // Stores
        $manufacturer->clearAllStoresRelations();
        if (isset($this->stores) && count($this->stores)) {
            foreach ($this->stores as $storeId)
                $manufacturer->addToStore($storeId);
        }
    }

}