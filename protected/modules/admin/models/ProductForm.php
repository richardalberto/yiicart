<?php

/**
 * ProductForm class.
 * ProductForm is the data structure for keeping
 * product form data. It is used by the 'create' and 'update' action of 'ProductController'.
 */
class ProductForm extends CFormModel {

    public $id;
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
    public $lengthClass;
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
            'name'=>Yii::t('products', 'Product Name'),
            'metaTagDescription'=>Yii::t('products', 'Meta Tag Description'),       
            'metaTagKeywords'=>Yii::t('products', 'Meta Tag Keywords'), 
            'description'=>Yii::t('products', 'Description'), 
            'productTags'=>Yii::t('products', 'Product Tags'), 
            'model'=>Yii::t('products', 'Model'), 
            'sku'=>Yii::t('products', 'SKU'), 
            'upc'=>Yii::t('products', 'UPC'), 
            'ean'=>Yii::t('products', 'EAN'), 
            'jan'=>Yii::t('products', 'JAN'), 
            'isbn'=>Yii::t('products', 'ISBN'), 
            'mpn'=>Yii::t('products', 'MPN'), 
            'location'=>Yii::t('products', 'Location'),
            'price'=>Yii::t('products', 'Price'),
            'taxClass'=>Yii::t('products', 'Tax Class'),
            'taxClass'=>Yii::t('products', 'Tax Class'),
            'quantity'=>Yii::t('products', 'Quantity'), 
            'minimumQuantity'=>Yii::t('products', 'Minimum Quantity'), 
            'subtractStock'=>Yii::t('products', 'Subtract Stock'), 
            'outOfStockStatus'=>Yii::t('products', 'Out Of Stock Status'), 
            'requiresShipping'=>Yii::t('products', 'Requires Shipping'), 
            'seoKeyword'=>Yii::t('products', 'SEO Keyword'), 
            'image'=>Yii::t('products', 'Image'), 
            'dateAvailable'=>Yii::t('products', 'Date Available'), 
            'dimensionL'=>Yii::t('products', 'Dimension L'), 
            'dimensionW'=>Yii::t('products', 'Dimension W'),
            'dimensionH'=>Yii::t('products', 'Dimension H'), 
            'lengthClass'=>Yii::t('products', 'Lenght Class'), 
            'weight'=>Yii::t('products', 'Weight'), 
            'weightClass'=>Yii::t('products', 'Weight Class'), 
            'status'=>Yii::t('products', 'Status'), 
            'sortOrder'=>Yii::t('products', 'Sort Order'), 
            'manufacturer'=>Yii::t('products', 'Manufacturer'), 
            'categories'=>Yii::t('products', 'Categories'), 
            'filters'=>Yii::t('products', 'Filters'),
            'stores'=>Yii::t('products', 'Stores'),
            'downloads'=>Yii::t('products', 'Downloads'),
            'relatedProducts'=>Yii::t('products', 'Related Products'),
        );
    }
    
    public function getProduct(){
        if(!is_null($this->id)){
            return Product::model()->findByPk($this->id);
        }        
        return null;
    }
    
    public function loadDataFromProduct($id){
        $product = Product::model()->findByPk($id);
        if(!is_null($product)){
            $this->id = $product->product_id;
            $this->name = $product->description->name;
            $this->metaTagDescription = $product->description->meta_description;
            $this->metaTagKeywords = $product->description->meta_keyword;
            $this->description = $product->description->getDescription();
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
            $this->subtractStock = $product->subtract;
            $this->outOfStockStatus = $product->stock_status_id;
            $this->requiresShipping = $product->shipping;
            // TODO: add seo keyword
            $this->seoKeyword = '';
            $this->image = $product->image;
            $this->dateAvailable = $product->date_available;
            $this->dimensionL = $product->length;
            $this->dimensionW = $product->width;
            $this->dimensionH = $product->height;
            $this->lengthClass = $product->length_class_id;
            $this->weight = $product->weight;
            $this->weightClass = $product->weight_class_id;
            $this->weightClass = $product->weight_class_id;
            $this->sortOrder = $product->sort_order;
            $this->status = $product->status;
            $this->manufacturer = $product->manufacturer_id;
            // TODO: add categories
            // TODO: add filters
            // TODO: add stores
            // TODO: add downloads
            // TODO: add related products
        }
    }

}