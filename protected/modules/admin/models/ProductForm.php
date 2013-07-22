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
            array('id, price, taxClass, quantity, minimumQuantity, subtractStock, outOfStockStatus, requiresShipping, dimensionW, dimensionH, dimensionL, weight, weightClass, status, sortOrder, manufacturer', 'numerical'),
            array('dateAvailable', 'date', 'format' => 'yyyy-MM-dd'),
            array('metaTagDescription, metaTagKeywords, description, productTags, model, sku, upc, ean, jan, isbn, mpn, location, seoKeyword, image, categories, filters, stores, downloadas, relatedProducts', 'safe')
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'name' => Yii::t('products', 'Product Name'),
            'metaTagDescription' => Yii::t('products', 'Meta Tag Description'),
            'metaTagKeywords' => Yii::t('products', 'Meta Tag Keywords'),
            'description' => Yii::t('products', 'Description'),
            'productTags' => Yii::t('products', 'Product Tags'),
            'model' => Yii::t('products', 'Model'),
            'sku' => Yii::t('products', 'SKU'),
            'upc' => Yii::t('products', 'UPC'),
            'ean' => Yii::t('products', 'EAN'),
            'jan' => Yii::t('products', 'JAN'),
            'isbn' => Yii::t('products', 'ISBN'),
            'mpn' => Yii::t('products', 'MPN'),
            'location' => Yii::t('products', 'Location'),
            'price' => Yii::t('products', 'Price'),
            'taxClass' => Yii::t('products', 'Tax Class'),
            'taxClass' => Yii::t('products', 'Tax Class'),
            'quantity' => Yii::t('products', 'Quantity'),
            'minimumQuantity' => Yii::t('products', 'Minimum Quantity'),
            'subtractStock' => Yii::t('products', 'Subtract Stock'),
            'outOfStockStatus' => Yii::t('products', 'Out Of Stock Status'),
            'requiresShipping' => Yii::t('products', 'Requires Shipping'),
            'seoKeyword' => Yii::t('products', 'SEO Keyword'),
            'image' => Yii::t('products', 'Image'),
            'dateAvailable' => Yii::t('products', 'Date Available'),
            'dimensionL' => Yii::t('products', 'Dimension L'),
            'dimensionW' => Yii::t('products', 'Dimension W'),
            'dimensionH' => Yii::t('products', 'Dimension H'),
            'lengthClass' => Yii::t('products', 'Lenght Class'),
            'weight' => Yii::t('products', 'Weight'),
            'weightClass' => Yii::t('products', 'Weight Class'),
            'status' => Yii::t('products', 'Status'),
            'sortOrder' => Yii::t('products', 'Sort Order'),
            'manufacturer' => Yii::t('products', 'Manufacturer'),
            'categories' => Yii::t('products', 'Categories'),
            'filters' => Yii::t('products', 'Filters'),
            'stores' => Yii::t('products', 'Stores'),
            'downloads' => Yii::t('products', 'Downloads'),
            'relatedProducts' => Yii::t('products', 'Related Products'),
        );
    }

    public function getProduct() {
        if (!is_null($this->id)) {
            return Product::model()->findByPk($this->id);
        }
        return new Product;
    }

    public function loadDataFromProduct($id) {
        $product = Product::model()->findByPk($id);
        if (!is_null($product)) {
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
            $this->seoKeyword = $product->getSEOKeyword();
            $this->image = $product->image;
            $this->dateAvailable = $product->date_available;
            $this->dimensionL = $product->length;
            $this->dimensionW = $product->width;
            $this->dimensionH = $product->height;
            $this->lengthClass = $product->length_class_id;
            $this->weight = $product->weight;
            $this->weightClass = $product->weight_class_id;
            $this->sortOrder = $product->sort_order;
            $this->status = $product->status;
            $this->manufacturer = $product->manufacturer_id;

            // Categories
            if (isset($product->categories) && count($product->categories)) {
                foreach ($product->categories as $category)
                    $this->categories[$category->category_id] = $category->description->name;
            }

            // Filters
            if (isset($product->filters) && count($product->filters)) {
                foreach ($product->filters as $filter)
                    $this->filters[$filter->filter_id] = $filter->description->name;
            }

            // Stores
            if (isset($product->stores) && count($product->stores)) {
                foreach ($product->stores as $store)
                    $this->stores[$store->store_id] = $store->name;
            }

            // Downloads
            if (isset($product->downloads) && count($product->downloads)) {
                foreach ($product->downloads as $download)
                    $this->downloads[$download->download_id] = $download->description->name;
            }

            // Related Products
            if (isset($product->relatedProducts) && count($product->relatedProducts)) {
                foreach ($product->relatedProducts as $product)
                    $this->relatedProducts[$product->product_id] = $product->description->name;
            }
        }
    }

    public function save() {
        $product = Product::model()->findByPk($this->id);
        if (is_null($product)) { // insert   
            // Product
            $product = new Product;
            $product->model = $this->model;
            $product->sku = $this->sku;
            $product->upc = $this->upc;
            $product->ean = $this->ean;
            $product->jan = $this->jan;
            $product->isbn = $this->isbn;
            $product->mpn = $this->mpn;
            $product->location = $this->location;
            $product->price = $this->price;
            $product->tax_class_id = $this->taxClass;
            $product->quantity = $this->quantity;
            $product->minimum = $this->minimumQuantity;
            $product->subtract = $this->subtractStock;
            $product->stock_status_id = $this->outOfStockStatus;
            $product->shipping = $this->requiresShipping;
            $product->image = $this->image;
            $product->date_available = $this->dateAvailable;
            $product->length = $this->dimensionL;
            $product->height = $this->dimensionH;
            $product->width = $this->dimensionW;
            $product->weight = $this->weight;
            $product->weight_class_id = $this->weightClass;
            $product->sort_order = $this->sortOrder;
            $product->status = $this->status;
            $product->manufacturer_id = $this->manufacturer;
            $product->save();

            // Description
            $description = new ProductDescription;
            $description->product_id = $product->product_id;
            $description->language_id = 1; // TODO: make this dynamic
            $description->name = $this->name;
            $description->meta_description = $this->metaTagDescription;
            $description->meta_keyword = $this->metaTagKeywords;
            $description->description = $this->description;
            $description->tag = $this->productTags;
            $description->save();
        } else { // update
            // Product
            $product->model = $this->model;
            $product->sku = $this->sku;
            $product->upc = $this->upc;
            $product->ean = $this->ean;
            $product->jan = $this->jan;
            $product->isbn = $this->isbn;
            $product->mpn = $this->mpn;
            $product->location = $this->location;
            $product->price = $this->price;
            $product->tax_class_id = $this->taxClass;
            $product->quantity = $this->quantity;
            $product->minimum = $this->minimumQuantity;
            $product->subtract = $this->subtractStock;
            $product->stock_status_id = $this->outOfStockStatus;
            $product->shipping = $this->requiresShipping;
            $product->image = $this->image;
            $product->date_available = $this->dateAvailable;
            $product->length = $this->dimensionL;
            $product->height = $this->dimensionH;
            $product->width = $this->dimensionW;
            $product->weight = $this->weight;
            $product->weight_class_id = $this->weightClass;
            $product->sort_order = $this->sortOrder;
            $product->status = $this->status;
            $product->manufacturer_id = $this->manufacturer;
            $product->save();

            // Description
            $product->description->name = $this->name;
            $product->description->meta_description = $this->metaTagDescription;
            $product->description->meta_keyword = $this->metaTagKeywords;
            $product->description->description = $this->description;
            $product->description->tag = $this->productTags;
            $product->description->save();
        }
        
        // SEO Keyword
        $product->updateSEOKeyword($this->seoKeyword);

        // Filters
        $product->clearAllFiltersRelations();
        if (isset($this->filters) && count($this->filters) > 0) {
            foreach ($this->filters as $filterId)
                $product->addFilter($filterId);
        }

        // Categories
        $product->clearAllCategoriesRelations();
        if (isset($this->categories) && count($this->categories)) {
            foreach ($this->categories as $categoryId)
                $product->addToCategory($categoryId);
        }

        // Stores
        $product->clearAllStoresRelations();
        if (isset($this->stores) && count($this->stores)) {
            foreach ($this->stores as $storeId)
                $product->addToStore($storeId);
        }

        // Downloads
        $product->clearAllDownloadsRelations();
        if (isset($this->downloads) && count($this->downloads)) {
            foreach ($this->downloads as $downloadId)
                $product->addToDownload($downloadId);
        }

        // Related Products
        $product->clearAllRelatedProductsRelations();
        if (isset($this->relatedProducts) && count($this->relatedProducts)) {
            foreach ($this->relatedProducts as $relatedId)
                $product->addRelatedProduct($relatedId);
        }
    }

}