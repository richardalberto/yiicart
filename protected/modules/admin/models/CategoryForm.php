<?php

/**
 * CategoryForm class.
 * CategoryForm is the data structure for keeping
 * category form data. It is used by the 'create' and 'update' action of 'CategoryController'.
 */
class CategoryForm extends CFormModel {

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
            'metaTagDescription'=>Yii::t('model.CategoryForm', 'Meta Tag Description'),       
            'metaTagKeywords'=>Yii::t('model.CategoryForm', 'Meta Tag Keywords'), 
            'description'=>Yii::t('model.CategoryForm', 'Description'), 
            'parent'=>Yii::t('model.CategoryForm', 'Parent'), 
            'filters'=>Yii::t('model.CategoryForm', 'Filters'), 
            'stores'=>Yii::t('model.CategoryForm', 'Stores'), 
            'seoKeyword'=>Yii::t('model.CategoryForm', 'SEO Keyword'), 
            'image'=>Yii::t('model.CategoryForm', 'Image'), 
            'top'=>Yii::t('model.CategoryForm', 'Top'), 
            'columns'=>Yii::t('model.CategoryForm', 'Columns'), 
            'sortOrder'=>Yii::t('model.CategoryForm', 'Sort Order'), 
            'status'=>Yii::t('model.CategoryForm', 'Status'), 
        );
    }
    
    public function loadDataFromCategory($id){
        $category = Category::model()->findByPk($id);
        if(!is_null($category)){
            $this->name = $category->description->name;
            $this->metaTagDescription = $category->description->meta_description;
            $this->metaTagKeywords = $category->description->meta_keyword;
            $this->description = $category->description->description;
            $this->image = $category->image;
            $this->top = $category->top;
            $this->columns = $category->column;
            $this->sortOrder = $category->sort_order;
            $this->status = $category->status;
        }
    }

}