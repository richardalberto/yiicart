<?php

class AttributeGroupsController extends BackendController {
    
    public function actionIndex(){
        $groups = AttributeGroup::model()->findAll();
        
        $this->render('index', array(
            'groups'=>$groups  
        ));
    }
    
    public function actionCreate(){
        $model = new AttributeGroupForm;
        if (isset($_POST['AttributeGroupForm'])) {
            $model->attributes = $_POST['AttributeGroupForm'];
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
        $model = new AttributeGroupForm;
        if (isset($_POST['AttributeGroupForm'])) {
            $model->attributes = $_POST['AttributeGroupForm'];
            if ($model->validate()) {
                $model->save();
                $this->redirect(array('index'));
            }
        }
        else
            $model->loadDataFromAttributeGroup($id);
        
        $groups = CHtml::listData(AttributeGroupDescription::model()->findAll(), 'attribute_group_id', 'name');
        
        $this->render('update', array(
            'model'=>$model,
            'groups'=>$groups,
        ));
    }
    
    public function actionDelete($ids){
        $ids = explode(',', $ids);
        if(count($ids) > 0){
            foreach($ids as $id){
                $attributeGroup = AttributeGroup::model()->findByPk($id);
                $attributeGroup->delete();
            }
        }
        
        $this->redirect(array('index'));
    }

    public function actionAutocomplete($query){ 
        // TODO: add locale
        $descriptions = AttributeDescription::model()->findAll("name LIKE '%{$query}%' ");
        foreach($descriptions as $description){
            $json[] = array('id'=>$description->attribute_id, 'value'=>$description->name);
        }
        
        echo CJSON::encode($json);
    }

}