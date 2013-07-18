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
        
        $statues = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled')
        );
        
        $this->render('create', array(
            'model'=>$model,
            'statues'=>$statues
        ));
    }
    
    public function actionUpdate($id){
        $model = new ProductForm;
        $model->loadDataFromProduct($id);
        
        $statues = array(
            0=>Yii::t('common', 'Disabled'),
            1=>Yii::t('common', 'Enabled')
        );        
        
        $this->render('update', array(
            'model'=>$model,
            'statues'=>$statues
        ));        
    }
    
    public function actionDelete($id){
        
    }

}