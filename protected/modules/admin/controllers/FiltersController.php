<?php

class FiltersController extends BackendController {

    public function actionAutocomplete($query){
        $json = array();
        
        // TODO: add locale
        $descriptions = FilterDescription::model()->findAll("name LIKE '%{$query}%' ");
        foreach($descriptions as $description){
            $json[] = array('id'=>$description->filter_id, 'value'=>$description->name);
        }
        
        echo CJSON::encode($json);
    }

}