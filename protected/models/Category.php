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

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Category the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('top, column, status', 'required'),
            array('parent_id, top, column, sort_order, status', 'numerical', 'integerOnly' => true),
            array('image', 'length', 'max' => 255),
            array('date_added, date_modified', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('category_id, image, parent_id, top, column, sort_order, status, date_added, date_modified', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'description' => array(self::HAS_ONE, 'CategoryDescription', 'category_id'),
            'products' => array(self::MANY_MANY, 'Product', 'product_to_category(product_id, category_id)'),
            'childCategories' => array(self::HAS_MANY, 'Category', 'parent_id')
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
    
    public function hasChildCategories(){
        return count($this->childCategories) > 0 ? true : false;
    }
    
    public function hasProducts(){                
        return count($this->getProductsCount()) > 0 ? true : false;
    }
    
    public function getProductsCount(){
        $productsCount = count($this->products);
        
        // check childs
        if($this->hasChildCategories()) {
            foreach($this->childCategories as $category)
                $productsCount += count($category->products);
        }
                
        return $productsCount;
    }

}