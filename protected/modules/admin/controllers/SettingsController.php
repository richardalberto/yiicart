<?php

class SettingsController extends BackendController {

    public function actionIndex() {
        $stores = Store::model()->findAll();
        
        $this->render('index', array(
            'stores'=>$stores
        ));
    }
    
    public function actionCreate(){
        $model = new SettingsForm;
        if (isset($_POST['SettingsForm'])) {
            $model->attributes = $_POST['SettingsForm'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }
        
        $directories = glob(Yii::getPathOfAlias('webroot.themes'), GLOB_ONLYDIR);
        $themes = array();
        foreach ($directories as $directory) {
                $themes[] = basename($directory);
        }
        
        $layouts = CHtml::listData(Layout::model()->findAll(), 'layout_id', 'name');
        
        $countries = CHtml::listData(Country::model()->findAll(), 'country_id', 'name');
        
        $zones = CHtml::listData(Zone::model()->findAll(array('country_id'=>$model->country)), 'zone_id', 'name');
        
        $languages = CHtml::listData(Language::model()->findAll(), 'language_id', 'name');
        
        $currencies = CHtml::listData(Currency::model()->findAll(), 'currency_id', 'title');

        $yesNoOptions = array(
            0=>Yii::t('settings', 'No'),
            1=>Yii::t('settings', 'Yes')
        );

        $lengthClasses = CHtml::listData(LengthClassDescription::model()->findAll(), 'length_class_id', 'title');

        $weightClasses = CHtml::listData(WeightClassDescription::model()->findAll(), 'weight_class_id', 'title');

        $taxesOptions = array(
            "" => Yii::t("settings", "--- None ---"),
            "shipping" => Yii::t("settings", "Shipping Address"),
            "payment" => Yii::t("settings", "Payment Address"),
        );

        $customerGroups = CHtml::listData(CustomerGroupDescription::model()->findAll(), 'customer_group_id', 'name');

        $informations = CHtml::listData(InformationDescription::model()->findAll(), 'information_id', 'title');

        // TODO: localisation
        $orderStatuses = CHtml::listData(OrderStatus::model()->findAllByAttributes(array('language_id'=>1)), 'order_status_id', 'name');

        // TODO: localisation
        $returnStatuses = CHtml::listData(ReturnStatus::model()->findAllByAttributes(array('language_id'=>1)), 'return_status_id', 'name');

        $mailProtocols = array(
            "mail" => Yii::t("settings", "Mail"),
            "smtp" => Yii::t("settings", "SMTP")
        );
        
        $this->render('create', array(
            'model'=>$model,
            'themes'=>$themes,
            'layouts'=>$layouts,
            'countries'=>$countries,
            'zones'=>$zones,
            'languages'=>$languages,
            'currencies'=>$currencies,
            'yesNoOptions'=>$yesNoOptions,
            'lengthClasses'=>$lengthClasses,
            'weightClasses'=>$weightClasses,
            'taxesOptions'=>$taxesOptions,
            'customerGroups'=>$customerGroups,
            'informations'=>$informations,
            'orderStatuses'=>$orderStatuses,
            'returnStatuses'=>$returnStatuses,
            'mailProtocols'=>$mailProtocols
        ));
    }
    
    public function actionUpdate($id){
        $model = new SettingsForm;
        if (isset($_POST['SettingsForm'])) {
            $model->attributes = $_POST['SettingsForm'];
            if ($model->validate() && $model->save()) {
                $this->redirect(array('index'));
            }
        }
        else
            $model->loadDataFromStore($id);
        
        $directories = glob(Yii::getPathOfAlias('webroot.themes') . "/*", GLOB_ONLYDIR);
        $themes = array();
        foreach ($directories as $directory) {
                $themes[] = basename($directory);
        }
        
        $layouts = CHtml::listData(Layout::model()->findAll(), 'layout_id', 'name');
        
        $countries = CHtml::listData(Country::model()->findAll(), 'country_id', 'name');
        
        $zones = CHtml::listData(Zone::model()->findAllByAttributes(array('country_id'=>$model->country)), 'zone_id', 'name');
        
        $languages = CHtml::listData(Language::model()->findAll(), 'language_id', 'name');
        
        $currencies = CHtml::listData(Currency::model()->findAll(), 'currency_id', 'title');
        
        $yesNoOptions = array(
            0=>Yii::t('settings', 'No'),
            1=>Yii::t('settings', 'Yes')
        );

        $lengthClasses = CHtml::listData(LengthClassDescription::model()->findAll(), 'length_class_id', 'title');

        $weightClasses = CHtml::listData(WeightClassDescription::model()->findAll(), 'weight_class_id', 'title');

        $taxesOptions = array(
            "" => Yii::t("settings", "--- None ---"),
            "shipping" => Yii::t("settings", "Shipping Address"),
            "payment" => Yii::t("settings", "Payment Address"),
        );

        $customerGroups = CHtml::listData(CustomerGroupDescription::model()->findAll(), 'customer_group_id', 'name');

        $informations = array_merge(array(0=>Yii::t("settings", "--- None ---")), CHtml::listData(InformationDescription::model()->findAll(), 'information_id', 'title'));;

        // TODO: localisation
        $orderStatuses = CHtml::listData(OrderStatus::model()->findAllByAttributes(array('language_id'=>1)), 'order_status_id', 'name');

        // TODO: localisation
        $returnStatuses = CHtml::listData(ReturnStatus::model()->findAllByAttributes(array('language_id'=>1)), 'return_status_id', 'name');

        $mailProtocols = array(
            "mail" => Yii::t("settings", "Mail"),
            "smtp" => Yii::t("settings", "SMTP")
        );
        
        $this->render('update', array(
            'model'=>$model,
            'themes'=>$themes,
            'layouts'=>$layouts,
            'countries'=>$countries,
            'zones'=>$zones,
            'languages'=>$languages,
            'currencies' =>$currencies,
            'yesNoOptions'=>$yesNoOptions,
            'lengthClasses'=>$lengthClasses,
            'weightClasses'=>$weightClasses,
            'taxesOptions'=>$taxesOptions,
            'customerGroups'=>$customerGroups,
            'informations'=>$informations,
            'orderStatuses'=>$orderStatuses,
            'returnStatuses'=>$returnStatuses,
            'mailProtocols'=>$mailProtocols
        ));        
    }

}