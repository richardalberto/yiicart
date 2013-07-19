<?php

/**
 * CategoryForm class.
 * CategoryForm is the data structure for keeping
 * category form data. It is used by the 'create' and 'update' action of 'CategoryController'.
 */
class CategoryForm extends CFormModel {

    public $id;
    public $name;
    public $metaTagDescription;
    public $metaTagKeywords;
    public $description;
    public $parent;
    public $filters;
    public $stores;
    public $seoKeyword;
    public $image;
    public $top;
    public $columns;
    public $sortOrder;
    public $status;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('name', 'required'),
            array('top, columns, sortOrder, parent, status', 'numerical'),
            array('metaTagDescription, metaTagKeywords, description', 'safe')
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'name'=>Yii::t('category', 'Name'),
            'metaTagDescription'=>Yii::t('category', 'Meta Tag Description'),       
            'metaTagKeywords'=>Yii::t('category', 'Meta Tag Keywords'), 
            'description'=>Yii::t('category', 'Description'), 
            'parent'=>Yii::t('category', 'Parent'), 
            'filters'=>Yii::t('category', 'Filters'), 
            'stores'=>Yii::t('category', 'Stores'), 
            'seoKeyword'=>Yii::t('category', 'SEO Keyword'), 
            'image'=>Yii::t('category', 'Image'), 
            'top'=>Yii::t('category', 'Top'), 
            'columns'=>Yii::t('category', 'Columns'), 
            'sortOrder'=>Yii::t('category', 'Sort Order'), 
            'status'=>Yii::t('category', 'Status'),             
        );
    }
    
    public function getCategory(){
        if(!is_null($this->id)){
            return Category::model()->findByPk($this->id);
        }        
        return new Category;
    }
    
    public function loadDataFromCategory($id){
        $category = Category::model()->findByPk($id);
        if(!is_null($category)){
            $this->id = $category->category_id;
            $this->name = $category->description->name;
            $this->metaTagDescription = $category->description->meta_description;
            $this->metaTagKeywords = $category->description->meta_keyword;
            $this->description = $category->description->description;
            $this->image = $category->image;
            $this->top = $category->top;
            $this->columns = $category->column;
            $this->sortOrder = $category->sort_order;
            $this->status = $category->status;
            $this->parent = $category->parent_id;
        }
    }
    
    public function save(){
        $category = Category::model()->findByPk($this->id);
        if(is_null($category)) { // insert          
            // category
            $category = new Category;
            $category->date_added = date('Y-m-d');
            $category->date_modified = date('Y-m-d');
            $category->image = $this->image;
            $category->top = $this->top;
            $category->column = $this->columns;
            $category->sort_order = $this->sortOrder;
            $category->status = $this->status;
            $category->parent_id = $this->parent;
            $category->save();
            
            // description
            $description = new CategoryDescription;
            $description->category_id = $category->category_id;
            $description->language_id = 1; // TODO: language must be dynamic
            $description->name = $this->name;
            $description->meta_description = $this->metaTagDescription;
            $description->meta_keyword = $this->metaTagKeywords;
            $description->description = $this->description;
            $description->save();
        }
        else{ // update
            // category
            $category->date_modified = date('Y-m-d');
            $category->image = $this->image;
            $category->top = $this->top;
            $category->column = $this->columns;
            $category->sort_order = $this->sortOrder;
            $category->status = $this->status;
            $category->parent_id = $this->parent;
            $category->save();
            
            // description
            $category->description->name = $this->name;
            $category->description->meta_description = $this->metaTagDescription;
            $category->description->meta_keyword = $this->metaTagKeywords;
            $category->description->description = $this->description;
            $category->description->save();
        }
    }

}