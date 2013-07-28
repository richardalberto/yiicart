<?php

class GeoZonesController extends BackendController {

    public function actionIndex() {
        $geoZones = GeoZone::model()->findAll();
        
        $this->render('index', array(
            'geoZones'=>$geoZones            
        ));
    }

}