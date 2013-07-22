<?php

class StoresController extends BackendController {

    public function actionAutocomplete($query){
        $json = array(array('id'=>0, 'value'=>Yii::t('store', 'Default')));
        
        $stores = Store::model()->findAll("name LIKE '%{$query}%' ");
        foreach($stores as $store){
            $json[] = array('id'=>$store->category_id, 'value'=>$store->name);
        }
        
        echo CJSON::encode($json);
    }

}