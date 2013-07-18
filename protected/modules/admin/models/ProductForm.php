<?php

/**
 * ProductForm class.
 * ProductForm is the data structure for keeping
 * product form data. It is used by the 'create' and 'update' action of 'ProductController'.
 */
class ProductForm extends CFormModel {

    public $name;
    public $metaTagDescription;
    public $metaTagKeywords;
    public $description;
    public $productTags;
    public $model;
    public $sku;
    public $upc;
    public $ean;
    public $jan;
    public $isbn;
    public $mpn;
    public $location;
    public $price;
    public $taxClass;
    public $quantity;
    public $minimumQuantity;
    public $subtractStock;
    public $outOfStockStatus;
    public $requiresShipping;
    public $seoKeyword;
    public $image;
    public $dateAvailable;
    public $dimensionL;
    public $dimensionW;
    public $dimensionH;
    public $lenghtClass;
    public $weight;
    public $weightClass;
    public $status;
    public $sortOrder;
    public $manufacturer;
    public $categories;
    public $filters;
    public $stores;
    public $downloads;
    public $relatedProducts;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('name, model', 'required'),
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'name'=>Yii::t('model.ProductForm', 'Product Name'),
            'metaTagDescription'=>Yii::t('model.ProductForm', 'Meta Tag Description'),       
            'metaTagKeywords'=>Yii::t('model.ProductForm', 'Meta Tag Keywords'), 
            'description'=>Yii::t('model.ProductForm', 'Description'), 
            'productTags'=>Yii::t('model.ProductForm', 'Product Tags'), 
            'model'=>Yii::t('model.ProductForm', 'Model'), 
            'sku'=>Yii::t('model.ProductForm', 'SKU'), 
            'upc'=>Yii::t('model.ProductForm', 'UPC'), 
            'ean'=>Yii::t('model.ProductForm', 'EAN'), 
            'jan'=>Yii::t('model.ProductForm', 'JAN'), 
            'isbn'=>Yii::t('model.ProductForm', 'ISBN'), 
            'mpn'=>Yii::t('model.ProductForm', 'MPN'), 
            'location'=>Yii::t('model.ProductForm', 'Location'),
            'price'=>Yii::t('model.ProductForm', 'Price'),
            'taxClass'=>Yii::t('model.ProductForm', 'Tax Class'),
            'taxClass'=>Yii::t('model.ProductForm', 'Tax Class'),
            'quantity'=>Yii::t('model.ProductForm', 'Quantity'), 
            'minimumQuantity'=>Yii::t('model.ProductForm', 'Minimum Quantity'), 
            'subtractStock'=>Yii::t('model.ProductForm', 'Subtract Stock'), 
            'outOfStockStatus'=>Yii::t('model.ProductForm', 'Out Of Stock Status'), 
            'requiresShipping'=>Yii::t('model.ProductForm', 'Requires Shipping'), 
            'seoKeyword'=>Yii::t('model.ProductForm', 'SEO Keyword'), 
            'image'=>Yii::t('model.ProductForm', 'Image'), 
            'dateAvailable'=>Yii::t('model.ProductForm', 'Date Available'), 
            'dimensionL'=>Yii::t('model.ProductForm', 'Dimension L'), 
            'dimensionW'=>Yii::t('model.ProductForm', 'Dimension W'),
            'dimensionH'=>Yii::t('model.ProductForm', 'Dimension H'), 
            'lenghtClass'=>Yii::t('model.ProductForm', 'Lenght Class'), 
            'weight'=>Yii::t('model.ProductForm', 'Weight'), 
            'weightClass'=>Yii::t('model.ProductForm', 'Weight Class'), 
            'status'=>Yii::t('model.ProductForm', 'Status'), 
            'sortOrder'=>Yii::t('model.ProductForm', 'Sort Order'), 
            'manufacturer'=>Yii::t('model.ProductForm', 'Manufacturer'), 
            'categories'=>Yii::t('model.ProductForm', 'Categories'), 
            'filters'=>Yii::t('model.ProductForm', 'Filters'),
            'stores'=>Yii::t('model.ProductForm', 'Stores'),
            'downloads'=>Yii::t('model.ProductForm', 'Downloads'),
            'relatedProducts'=>Yii::t('model.ProductForm', 'Related Products'),
        );
    }
    
    public function loadDataFromProduct($id){
        $product = Product::model()->findByPk($id);
        if(!is_null($product)){
            $this->name = $product->description->name;
            $this->metaTagDescription = $product->description->meta_description;
            $this->metaTagKeywords = $product->description->meta_keyword;
            $this->description = $product->description->description;
            $this->productTags = $product->description->tag;
            $this->model = $product->model;
            $this->sku = $product->sku;
            $this->upc = $product->upc;
            $this->ean = $product->ean;
            $this->jan = $product->jan;
            $this->isbn = $product->isbn;
            $this->mpn = $product->mpn;
            $this->location = $product->location;
            $this->price = $product->price;
            $this->taxClass = $product->tax_class_id;
            $this->quantity = $product->quantity;
            $this->minimumQuantity = $product->minimum;
            $this->image = $product->image;
            $this->sortOrder = $product->sort_order;
            $this->status = $product->status;
        }
    }

}