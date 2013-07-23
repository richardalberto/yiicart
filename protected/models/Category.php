<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $category_id
 * @property string $image
 * @property integer $parent_id
 * @property integer $top
 * @property integer $column
 * @property integer $sort_order
 * @property integer $status
 * @property string $date_added
 * @property string $date_modified
 */
class Category extends CActiveRecord {
    
    private $cacheId;
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }
    
    public function __get($name) {
        // Override stores relation to include default store
        if($name == 'stores'){
            if(CategoryToStore::model()->exists("category_id={$this->category_id} AND store_id=0")){
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
        return 'category';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('top, column, status', 'required'),
            array('parent_id, top, column, sort_order, status', 'numerical', 'integerOnly' => true),
            array('image', 'length', 'max' => 255),
            array('date_added, date_modified', 'safe'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            // TODO: add locale
            'description' => array(self::HAS_ONE, 'CategoryDescription', 'category_id'), 
            'products' => array(self::MANY_MANY, 'Product', 'product_to_category(category_id, product_id)'),
            'activeProducts' => array(self::MANY_MANY, 'Product', 'product_to_category(category_id, product_id)', 'condition' => 'status=1'),
            'childCategories' => array(self::HAS_MANY, 'Category', 'parent_id'),
            'parent' => array(self::BELONGS_TO, 'Category', 'parent_id'),            
            'stores' => array(self::MANY_MANY, 'Store', 'category_to_store(category_id, store_id)'),
            'filters' => array(self::MANY_MANY, 'Filter', 'category_filter(category_id, filter_id)'),
        );
    }

    public function scopes() {
        return array(
            'firstLevel' => array(
                'condition' => 'parent_id=0',
            ),
            'active' => array(
                'condition' => 'status=1',
            ),
            'orderBySortOrder' => array(
                'order' => 'sort_order ASC',
            ),
            'onTop' => array(
                'condition' => 'top=1',
            )
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'category_id' => 'Category',
            'image' => 'Image',
            'parent_id' => 'Parent',
            'top' => 'Top',
            'column' => 'Column',
            'sort_order' => 'Sort Order',
            'status' => 'Status',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        );
    }

    public function beforeDelete() {
        $this->cacheId = $this->category_id;
        return parent::beforeDelete();
    }

    public function afterDelete() {
        // delete children
        $children = Category::model()->findAll("parent_id={$this->cacheId}");
        foreach ($children as $child)
            $child->delete();
        
        // delete dependencies
        CategoryPath::model()->deleteAll("category_id={$this->cacheId}");
        CategoryDescription::model()->deleteAll("category_id={$this->cacheId}");        
        CategoryFilter::model()->deleteAll("category_id={$this->cacheId}");
        CategoryToStore::model()->deleteAll("category_id={$this->cacheId}");
        CategoryToLayout::model()->deleteAll("category_id={$this->cacheId}");
        ProductToCategory::model()->deleteAll("category_id={$this->cacheId}");
        UrlAlias::model()->deleteAll("query='category_id={$this->cacheId}'");

        parent::afterDelete();
    }
    
    public function getFullname($fullname = null){
        if(is_null($fullname))
            $fullname = $this->description->getName();
        else
            $fullname = "{$this->description->getName()} > {$fullname}" ;
            
        if($this->hasParent())
            $fullname = $this->parent->getFullname($fullname);
        
        return $fullname;
    }
    
    public function hasParent(){
        return !is_null($this->parent);
    }

    public function hasChildCategories() {
        return count($this->childCategories) > 0 ? true : false;
    }

    public function hasProducts() {
        return count($this->getProductsCount()) > 0 ? true : false;
    }

    public function getProductsCount() {
        $productsCount = count($this->products);

        // check childs
        if ($this->hasChildCategories()) {
            foreach ($this->childCategories as $category)
                $productsCount += count($category->products);
        }

        return $productsCount;
    }

    public function getImageWithSize($width, $height) {
        if ($this->image && file_exists(Yii::app()->params['imagePath'] . $this->image)) {
            $_image = ImageTool::resize($this->image, $width, $height);
        } else {
            $_image = ImageTool::resize('no_image.jpg', $width, $height);
        }

        return $_image;
    }
    
    public function getParentName(){
        if(!is_null($this->parent)){
            return $this->parent->description->name;
        }
        
        return null;
    }
    
    public function addToStore($storeId) {
        if(!CategoryToStore::model()->countByAttributes(array('category_id'=>$this->category_id, 'store_id'=>$storeId))){
            $categoryToStore = new CategoryToStore;
            $categoryToStore->category_id = $this->category_id;
            $categoryToStore->store_id = $storeId;
            return $categoryToStore->save();
        }
        
        return false;
    }
    
    public function addFilter($filterId) {
        if(!CategoryFilter::model()->countByAttributes(array('category_id'=>$this->category_id, 'filter_id'=>$filterId))){
            $categoryFilter = new CategoryFilter;
            $categoryFilter->category_id = $this->category_id;
            $categoryFilter->filter_id = $filterId;
            return $categoryFilter->save();
        }
        
        return false;
    }
    
    public function clearAllStoresRelations(){
        CategoryToStore::model()->deleteAllByAttributes(array('category_id'=>$this->category_id));
    }
    
    public function clearAllFiltersRelations(){
        CategoryFilter::model()->deleteAllByAttributes(array('category_id'=>$this->category_id));
    }
    
    public function getUrlAlias(){
        return UrlAlias::model()->find("query='category_id={$this->category_id}'");;
    }
    
    public function getSEOKeyword(){
        $alias = $this->getUrlAlias();
        if(!is_null($alias)){
            return $alias->keyword;
        }
        return null;
    }
    
    public function updateSEOKeyword($keyword){
        if(!$this->isNewRecord){
            $alias = $this->getUrlAlias();
            
            // if keyword is empty delete url alias
            if(empty($keyword) || is_null($keyword)){
                if(!is_null($alias))
                    return $alias->delete();
                
                return false;
            }
            // else update
            else{
                if(is_null($alias)){
                    $alias = new UrlAlias;
                    $alias->query = "category_id={$this->category_id}";
                }

                $alias->keyword = $keyword;

                return $alias->save();
            }
        }
        else
            throw new CException(Yii::t('errors', 'Tried to update SEO Keyword for an object that doesn\'t exists yet.'));
    }

}