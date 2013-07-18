<?php

class ProductsController extends BackendController {

    public function actionIndex() {
        $products = Product::model()->findAll();
        
        $this->render('index', array(
            'products'=>$products            
        ));
    }
    
    public function actionCreate(){
        $model = new ProductForm;
        
        $statuses = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled')
        );
        
        $taxClasses = TaxClass::model()->findAll();
        $taxClassesList = array();
        foreach($taxClasses as $taxClass) $taxClassesList[$taxClass->tax_class_id] = $taxClass->title;
        
        $this->render('create', array(
            'model'=>$model,
            'statuses'=>$statues,
            'taxClassesList'=>$taxClassesList
        ));
    }
    
    public function actionUpdate($id){
        $model = new ProductForm;
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
    
    public function actionDelete($id){
        
    }

}