<?php

class ProductController extends Controller {
    
    public $layout='//layouts/column2';
    
    public function actionView($id) {
        $product = Product::model()->findByPk($id);
        if(is_null($product)){
            throw new HttpException('Error: Access forbiden', '404');
            Yii::app()->end();
        }
        
        // Group attributes to show on specs table
        $attributes = $product->attributes;
        $groups = array();
        foreach($attributes as $attribute){
            $groupId = $attribute->attribute->group->attribute_group_id;
            if(!isset($groups[$groupId]))
                $groups[$groupId] = array('name'=>$attribute->attribute->group->description->name,'attributes'=>array());
            
            $groups[$groupId]['attributes'][$attribute->attribute_id] = array('name'=>$attribute->attribute->description->name, 'text'=>$attribute->text);
        }
        
        $this->render('index', array(
            'product'=>$product,
            'groups'=>$groups,
        ));
    }
    
    public function actionCompare(){
        $this->render('compare', array(
            
        ));
    }

}