<?php

class AttributesController extends BackendController {
    
    public function actionIndex(){
        $attributes = Attribute::model()->findAll();
        
        $this->render('index', array(
            'attributes'=>$attributes            
        ));
    }
    
    public function actionCreate(){
        $model = new AttributeForm;
        if (isset($_POST['AttributeForm'])) {
            $model->attributes = $_POST['AttributeForm'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            }
        }
        
        $groups = CHtml::listData(AttributeGroupDescription::model()->findAll(), 'attribute_group_id', 'name');
        
        $this->render('create', array(
            'model'=>$model,
            'groups'=>$groups,
        ));
    }
    
    public function actionUpdate($id){
        $model = new AttributeForm;
        if (isset($_POST['AttributeForm'])) {
            $model->attributes = $_POST['AttributeForm'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            }
        }
        else
            $model->loadDataFromAttribute($id);
        
        $groups = CHtml::listData(AttributeGroupDescription::model()->findAll(), 'attribute_group_id', 'name');
        
        $this->render('create', array(
            'model'=>$model,
            'groups'=>$groups,
        ));
    }
    
    public function actionDelete($ids){
        $ids = explode(',', $ids);
        if(count($ids) > 0){
            foreach($ids as $id){
                $attribute = AttributeGroup::model()->findByPk($id);
                $attribute->delete();
            }
        }
        
        $this->redirect(array('index'));
    }

}