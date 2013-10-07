<?php

class SettingsManager extends CComponent{
    
    public function init(){
        // required!
    }
    
    public function getValue($settingName, $storeId = 0, $group='config'){
        $setting = Setting::model()->findByAttributes(array('key'=>$settingName, 'store_id'=>$storeId, 'group'=>$group));
        return !is_null($setting) ? $setting->value : null;
    }
    
    public function setValue($settingName, $settingValue, $storeId = 0, $group='config'){
        $setting = Setting::model()->findByAttributes(array('key'=>$settingName, 'store_id'=>$storeId, 'group'=>$group));
        if(is_null($setting)) {
            $setting = new Setting;
            $setting->key = $settingName;
            $setting->store_id = $storeId;
            $setting->group = $group;
        }
        
        $setting->value = $settingValue;
        $setting->save();
    }
}
?>
