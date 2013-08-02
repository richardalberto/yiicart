<?php

class ProductsController extends BackendController {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $count = Product::model()->count($criteria);
        $pages = new CPagination($count);

        // results per page
        $pages->pageSize = Yii::app()->settings->getValue('config_admin_limit');
        $pages->applyLimit($criteria);
        $products = Product::model()->findAll($criteria);
        
        $this->render('index', array(
            'products'=>$products,
            'pages' => $pages
        ));
    }
    
    public function actionCreate(){
        $model = new ProductForm;
        if (isset($_POST['ProductForm'])) {
            $model->attributes = $_POST['ProductForm'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            }
        }
        
        $statuses = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled')
        );
        
        $taxClasses = TaxClass::model()->findAll();
        $taxClassesList = array();
        foreach($taxClasses as $taxClass) $taxClassesList[$taxClass->tax_class_id] = $taxClass->title;
        
        $yes_no = array(
            0=>Yii::t('common', 'No'),
            1=>Yii::t('common', 'Yes')
        );
        
        $taxClasses = TaxClass::model()->findAll();
        $taxClassesList = array();
        foreach($taxClasses as $taxClass) $taxClassesList[$taxClass->tax_class_id] = $taxClass->title;
        
        // TODO: add language
        $stockStatuses = StockStatus::model()->findAll();
        $stockStatusesList = array();
        foreach($stockStatuses as $stockStatus) $stockStatusesList[$stockStatus->stock_status_id] = $stockStatus->name;
        
        // TODO: add language
        $weightClasses = WeightClass::model()->findAll();
        $weightClassesList = array();
        foreach($weightClasses as $weightClass) $weightClassesList[$weightClass->weight_class_id] = $weightClass->description->title;
        
        // TODO: add language
        $lengthClasses = LengthClass::model()->findAll();
        $lengthClassesList = array();
        foreach($lengthClasses as $lengthClass) $lengthClassesList[$lengthClass->length_class_id] = $lengthClass->description->title;
        
        $this->render('create', array(
            'model'=>$model,
            'statuses'=>$statuses,
            'taxClasses'=>$taxClassesList,
            'yes_no'=>$yes_no,
            'stockStatuses'=>$stockStatusesList,
            'weightClasses'=>$weightClassesList,
            'lengthClasses'=>$lengthClassesList,
        ));
    }
    
    public function actionUpdate($id){
        $model = new ProductForm;
        if (isset($_POST['ProductForm'])) {
            $model->attributes = $_POST['ProductForm'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            }
        }
        else
            $model->loadDataFromProduct($id);
        
        $statuses = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled')
        );
        
        $yes_no = array(
            0=>Yii::t('common', 'No'),
            1=>Yii::t('common', 'Yes')
        );
        
        $taxClasses = TaxClass::model()->findAll();
        $taxClassesList = array();
        foreach($taxClasses as $taxClass) $taxClassesList[$taxClass->tax_class_id] = $taxClass->title;
        
        // TODO: add language
        $stockStatuses = StockStatus::model()->findAll();
        $stockStatusesList = array();
        foreach($stockStatuses as $stockStatus) $stockStatusesList[$stockStatus->stock_status_id] = $stockStatus->name;
        
        // TODO: add language
        $weightClasses = WeightClass::model()->findAll();
        $weightClassesList = array();
        foreach($weightClasses as $weightClass) $weightClassesList[$weightClass->weight_class_id] = $weightClass->description->title;
        
        // TODO: add language
        $lengthClasses = LengthClass::model()->findAll();
        $lengthClassesList = array();
        foreach($lengthClasses as $lengthClass) $lengthClassesList[$lengthClass->length_class_id] = $lengthClass->description->title;
        
        $this->render('update', array(
            'model'=>$model,
            'statuses'=>$statuses,
            'taxClasses'=>$taxClassesList,
            'yes_no'=>$yes_no,
            'stockStatuses'=>$stockStatusesList,
            'weightClasses'=>$weightClassesList,
            'lengthClasses'=>$lengthClassesList,
        ));        
    }
    
    public function actionDelete($ids){
        $ids = explode(',', $ids);
        if(count($ids) > 0){
            foreach($ids as $id){
                $product = Product::model()->findByPk($id);
                $product->delete();
            }
        }
        
        $this->redirect(array('index'));
    }
    
    public function actionAutocomplete($query){     
        $json = array();
        $descriptions = ProductDescription::model()->findAll("name LIKE '%{$query}%' ");
        foreach($descriptions as $description){
            $json[] = array('id'=>$description->product_id, 'value'=>$description->name);
        }
        
        echo CJSON::encode($json);
    }

}