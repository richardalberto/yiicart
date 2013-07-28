<?php

class DownloadsController extends BackendController {
    
    public function actionIndex() {
        $downloads = Download::model()->findAll();
        
        $this->render('index', array(
            'downloads'=>$downloads            
        ));
    }

    public function actionAutocomplete($query){     
        $json = array();
        $descriptions = DownloadDescription::model()->findAll("name LIKE '%{$query}%' ");
        foreach($descriptions as $description){
            $json[] = array('id'=>$description->download_id, 'value'=>$description->name);
        }
        
        echo CJSON::encode($json);
    }

}