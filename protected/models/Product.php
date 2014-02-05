<?php

/**
 * This is the model class for table "product".
 *
 * The followings are the available columns in table 'product':
 * @property integer $product_id
 * @property string $model
 * @property string $sku
 * @property string $upc
 * @property string $ean
 * @property string $jan
 * @property string $isbn
 * @property string $mpn
 * @property string $location
 * @property integer $quantity
 * @property integer $stock_status_id
 * @property string $image
 * @property integer $manufacturer_id
 * @property integer $shipping
 * @property string $price
 * @property integer $points
 * @property integer $tax_class_id
 * @property string $date_available
 * @property string $weight
 * @property integer $weight_class_id
 * @property string $length
 * @property string $width
 * @property string $height
 * @property integer $length_class_id
 * @property integer $subtract
 * @property integer $minimum
 * @property integer $sort_order
 * @property integer $status
 * @property string $date_added
 * @property string $date_modified
 * @property integer $viewed
 */
class Product extends CActiveRecord {

    private $cacheId;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function __get($name) {
        // Override stores relation to include default store
        if ($name == 'stores') {
            if (ProductToStore::model()->exists("product_id={$this->product_id} AND store_id=0")) {
                $stores = parent::__get($name);

                $default = new Store;
                $default->name = Yii::t('stores', 'Default');
                $default->store_id = 0;
                $default->ssl = Yii::app()->baseUrl; // TODO: what should i do about ssl?!
                $default->url = Yii::app()->baseUrl;
                array_unshift($stores, $default);

                return $stores;
            }
        }
        else
            return parent::__get($name);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'product';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('model', 'required'),
            array('quantity, stock_status_id, manufacturer_id, shipping, points, tax_class_id, weight_class_id, length_class_id, subtract, minimum, sort_order, status, viewed', 'numerical', 'integerOnly' => true),
            array('model, sku, mpn', 'length', 'max' => 64),
            array('upc', 'length', 'max' => 12),
            array('ean', 'length', 'max' => 14),
            array('jan, isbn', 'length', 'max' => 13),
            array('location', 'length', 'max' => 128),
            array('image', 'length', 'max' => 255),
            array('price, weight, length, width, height', 'length', 'max' => 15),
            array('date_added, date_modified', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            // TODO: add locale
            'attributes' => array(self::HAS_MANY, 'ProductAttribute', 'product_id', 'condition' => 'language_id=1'),
            'manufacturer' => array(self::BELONGS_TO, 'Manufacturer', 'manufacturer_id'),
            'description' => array(self::HAS_ONE, 'ProductDescription', 'product_id'),
            'orders' => array(self::HAS_MANY, 'Order', 'customer_id'),
            'additionalImages' => array(self::HAS_MANY, 'ProductImage', 'product_id'),
            'stockStatus' => array(self::BELONGS_TO, 'StockStatus', 'stock_status_id'), // TODO: add language condition
            'categories' => array(self::MANY_MANY, 'Category', 'product_to_category(product_id, category_id)'),
            'filters' => array(self::MANY_MANY, 'Filter', 'product_filter(product_id, filter_id)'),
            'stores' => array(self::MANY_MANY, 'Store', 'product_to_store(product_id, store_id)'),
            'downloads' => array(self::MANY_MANY, 'Download', 'product_to_download(product_id, download_id)'),
            'relatedProducts' => array(self::MANY_MANY, 'Product', 'product_related(product_id, related_id)'),
            // TODO: add customer group id
            'reward' => array(self::HAS_ONE, 'ProductReward', 'product_id', 'condition' => 'customer_group_id=1'),
        );
    }

    public function scopes() {
        return array(
            'latest' => array(
                'order' => 'product_id DESC',
                'limit' => '8',
            ),
            'active' => array(
                'condition' => 'status=1',
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'product_id' => 'Product',
            'model' => 'Model',
            'sku' => 'Sku',
            'upc' => 'Upc',
            'ean' => 'Ean',
            'jan' => 'Jan',
            'isbn' => 'Isbn',
            'mpn' => 'Mpn',
            'location' => 'Location',
            'quantity' => 'Quantity',
            'stock_status_id' => 'Stock Status',
            'image' => 'Image',
            'manufacturer_id' => 'Manufacturer',
            'shipping' => 'Shipping',
            'price' => 'Price',
            'points' => 'Points',
            'tax_class_id' => 'Tax Class',
            'date_available' => 'Date Available',
            'weight' => 'Weight',
            'weight_class_id' => 'Weight Class',
            'length' => 'Length',
            'width' => 'Width',
            'height' => 'Height',
            'length_class_id' => 'Length Class',
            'subtract' => 'Subtract',
            'minimum' => 'Minimum',
            'sort_order' => 'Sort Order',
            'status' => 'Status',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
            'viewed' => 'Viewed',
        );
    }

    public function beforeDelete() {
        $this->cacheId = $this > product_id;
        return parent::beforeDelete();
    }

    public function afterDelete() {
        // delete dependencies
        ProductAttribute::model()->deleteAll("product_id={$this->cacheId}");
        ProductDescription::model()->deleteAll("product_id={$this->cacheId}");
        ProductDiscount::model()->deleteAll("product_id={$this->cacheId}");
        ProductFilter::model()->deleteAll("product_id={$this->cacheId}");
        ProductImage::model()->deleteAll("product_id={$this->cacheId}");
        ProductOption::model()->deleteAll("product_id={$this->cacheId}");
        ProductOptionValue::model()->deleteAll("product_id={$this->cacheId}");
        ProductRelated::model()->deleteAll("product_id={$this->cacheId}");
        ProductRelated::model()->deleteAll("related_id={$this->cacheId}");
        ProductReward::model()->deleteAll("product_id={$this->cacheId}");
        ProductSpecial::model()->deleteAll("product_id={$this->cacheId}");
        ProductToCategory::model()->deleteAll("product_id={$this->cacheId}");
        ProductToDownload::model()->deleteAll("product_id={$this->cacheId}");
        ProductToLayout::model()->deleteAll("product_id={$this->cacheId}");
        ProductToStore::model()->deleteAll("product_id={$this->cacheId}");
        Review::model()->deleteAll("product_id={$this->cacheId}");
        UrlAlias::model()->deleteAll("query='product_id={$this->cacheId}'");

        parent::afterDelete();
    }

    public function hasReward() {
        return!is_null($this->reward) ? true : false;
    }

    public function hasAttributes() {
        return count($this->attributes) > 0 ? true : false;
    }

    public function hasRelatedProducts() {
        return count($this->relatedProducts) > 0 ? true : false;
    }

    public function hasAdditionalImages() {
        return count($this->additionalImages) > 0 ? true : false;
    }

    public function getImageWithSize($width=0, $height=0) {
		if($width===0 || $height===0)
			return Yii::app()->getBaseUrl().DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$this->image;
        if ($this->image && file_exists(Yii::app()->params['imagePath'] . $this->image)) {
            $_image = ImageTool::resize($this->image, $width, $height);
        } else {
            $_image = ImageTool::resize('no_image.jpg', $width, $height);
        }
        return $_image;
    }

    public function getFormattedPrice() {
        // TODO: format price according to store settings
        return "$" . sprintf("%.2f", "{$this->price}");
    }

    public function getManufacturerName() {
        if (isset($this->manufacturer)) {
            return $this->manufacturer->name;
        }
        return null;
    }

    public function addFilter($filterId) {
        if (!ProductFilter::model()->countByAttributes(array('product_id' => $this->product_id, 'filter_id' => $filterId))) {
            $productFilter = new ProductFilter;
            $productFilter->product_id = $this->product_id;
            $productFilter->filter_id = $filterId;
            return $productFilter->save();
        }

        return false;
    }

    public function addToStore($storeId) {
        if (!ProductToStore::model()->countByAttributes(array('product_id' => $this->product_id, 'store_id' => $storeId))) {
            $productToStore = new ProductToStore;
            $productToStore->product_id = $this->product_id;
            $productToStore->store_id = $storeId;
            return $productToStore->save();
        }

        return false;
    }

    public function addToCategory($categoryId) {
        if (!ProductToCategory::model()->countByAttributes(array('product_id' => $this->product_id, 'category_id' => $categoryId))) {
            $productToCategory = new ProductToCategory;
            $productToCategory->product_id = $this->product_id;
            $productToCategory->category_id = $categoryId;
            return $productToCategory->save();
        }

        return false;
    }

    public function addToDownload($downloadId) {
        if (!ProductToDownload::model()->countByAttributes(array('product_id' => $this->product_id, 'download_id' => $downloadId))) {
            $productToDownload = new ProductToDownload;
            $productToDownload->product_id = $this->product_id;
            $productToDownload->download_id = $downloadId;
            return $productToDownload->save();
        }

        return false;
    }

    public function addRelatedProduct($relatedId) {
        if (!ProductRelated::model()->countByAttributes(array('product_id' => $this->product_id, 'related_id' => $relatedId))) {
            $productRelated = new ProductRelated;
            $productRelated->product_id = $this->product_id;
            $productRelated->related_id = $relatedId;
            return $productRelated->save();
        }

        return false;
    }

    public function clearAllStoresRelations() {
        ProductToStore::model()->deleteAllByAttributes(array('product_id' => $this->product_id));
    }

    public function clearAllFiltersRelations() {
        ProductFilter::model()->deleteAllByAttributes(array('product_id' => $this->product_id));
    }

    public function clearAllCategoriesRelations() {
        ProductToCategory::model()->deleteAllByAttributes(array('product_id' => $this->product_id));
    }

    public function clearAllDownloadsRelations() {
        ProductToDownload::model()->deleteAllByAttributes(array('product_id' => $this->product_id));
    }

    public function clearAllRelatedProductsRelations() {
        ProductRelated::model()->deleteAllByAttributes(array('product_id' => $this->product_id));
    }

    public function getUrlAlias() {
        return UrlAlias::model()->find("query='product_id={$this->product_id}'");
        ;
    }

    public function getSEOKeyword() {
        $alias = $this->getUrlAlias();
        if (!is_null($alias)) {
            return $alias->keyword;
        }
        return null;
    }

    public function updateSEOKeyword($keyword) {
        if (!$this->isNewRecord) {
            $alias = $this->getUrlAlias();

            // if keyword is empty delete url alias
            if (empty($keyword) || is_null($keyword)) {
                if (!is_null($alias))
                    return $alias->delete();

                return false;
            }
            // else update
            else {
                if (is_null($alias)) {
                    $alias = new UrlAlias;
                    $alias->query = "product_id={$this->product_id}";
                }

                $alias->keyword = $keyword;

                return $alias->save();
            }
        }
        else
            throw new CException(Yii::t('errors', 'Tried to update SEO Keyword for an object that doesn\'t exists yet.'));
    }

}