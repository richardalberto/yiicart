<?php

/**
 * SettingsForm class.
 * SettingsForm is the data structure for keeping
 * settings form data. It is used by the 'create' and 'update' action of 'SettingsController'.
 */
class SettingsForm extends CFormModel {

    public $id;
    
    /*
     *  General
     */
    public $name;
    public $owner;
    public $address;
    public $email;
    public $telephone;
    public $fax;
    
    /*
     * Store
     */
    public $title;
    public $metaTagDescription;
    public $template;
    public $defaultLayout;
    
    /*
     * Local
     */
    public $country;
    public $state;
    public $language;
    public $adminLanguage;
    public $currency;
    public $updateCurrency;
    public $lengthClass;
    public $weightClass;
    
    /*
     * Option
     */
    public $itemsPerPageCatalog;
    public $itemsPerPageAdmin;
    public $categoryProductCount;
    public $allowReviews;
    public $allowDownloads;
    public $voucherMin;
    public $voucherMax;
    public $displayPricesWithTax;
    public $vatNumberValidate;
    public $useStoreTaxAddress;
    public $useCustomTaxAddress;
    public $customersOnline;
    public $customerGroup;
    public $loginDisplayPrices;
    public $accountTerms;
    public $displayWeightOnCart;
    public $guestCheckout;
    public $checkoutTerms;
    public $orderEditing;
    public $invoicePrefix;
    public $orderStatus;
    public $completeOrderStatus;
    public $displayStock;
    public $showOutOfStockWarning;
    public $stockCheckout;
    public $outOfStockStatus;
    public $affiliateTerms;
    public $affiliateCommission;
    public $returnTerms;
    public $returnStatus;
    
    /*
     *  Image
     */
    public $storeLogo;
    public $icon;
    public $categoryImageSizeWidth;
    public $categoryImageSizeheight;
    public $productImageThumbSizeWidth;
    public $productImageThumbSizeHeight;
    public $productImagePopupSizeWidth;
    public $productImagePopupSizeHeight;
    public $productImageListSizeWidth;
    public $productImageListSizeHeight;
    public $additionalProductImageSizeWidth;
    public $additionalProductImageSizeHeight;
    public $relatedProductImageSizeWidth;
    public $relatedProductImageSizeHeight;
    public $compareImageSizeWidth;
    public $compareImageSizeHeight;
    public $wishListImageSizeWidth;
    public $wishListImageSizeHeight;
    public $cartImageSizeWidth;
    public $cartImageSizeHeight;
    
    /*
     * FTP
     */
    public $ftpHost;
    public $ftpPort;
    public $ftpUsername;
    public $ftpPassword;
    public $ftpRoot;
    public $ftpEnabled;
    
    /*
     * Mail
     */
    public $mailProtocol;
    public $mailParameters;
    public $smtpHost;
    public $smtpUsername;
    public $smtpPassword;
    public $smptPort;
    public $smptTimeout;
    public $newOrderAlertMail;
    public $newAccountAlertMail;
    public $additionalAlertMails;
    
    /*
     * Fraud
     */
    public $useMaxMindFraudDetectionSystem;
    public $maxMindLicenseKey;
    public $maxMindRiskScore;
    public $maxMindFraudOrderStatus;
    
    /*
     * Server
     */
    public $useSSL;
    public $useSharedSessions;
    public $robots;
    public $useSEOUrls;
    public $allowedFileExtensions;
    public $allowedFileMimetypes;
    public $maintenanceMode;
    public $allowForgottenPassword;
    public $encryptionKey;
    public $outputCompressionLevel;
    public $displayErrors;
    public $logErrors;
    public $errorLogFilename;
    public $googleAnalyticsCode;

    /**
     * Declares the validation rules.
     */
    public function rules() {
        return array(
            array('name, owner, address, email, telephone, title', 'required'),
            array('id, country, state, language, adminLanguage, currency, updateCurrency, lengthClass, weightClass, itemsPerPageCatalog, itemsPerPageAdmin, categoryProductCount, allowReviews, allowDownloads, voucherMin, voucherMax, displayPricesWithTax, vatNumberValidate, useStoreTaxAddress, useCustomTaxAddress, customersOnline, customerGroup, loginDisplayPrices, accountTerms, displayWeightOnCart, guestCheckout, checkoutTerms, orderEditing, orderStatus, completeOrderStatus, displayStock, showOutOfStockWarning, stockCheckout, outOfStockStatus, affiliateTerms, affiliateCommission, returnTerms, returnStatus', 'numerical'),
            array('email', 'email'),
            array('fax, metaTagDescription, template, defaultLayout, invoicePrefix', 'safe')
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels() {
        return array(
            'name'=>Yii::t('settings', 'Name'),
            'owner'=>Yii::t('settings', 'Owner'),
            'address'=>Yii::t('settings', 'Address'),
            'email'=>Yii::t('settings', 'E-Mail'),
            'telephone'=>Yii::t('settings', 'Telephone'),
            'fax'=>Yii::t('settings', 'Fax'),
            'title'=>Yii::t('settings', 'Title'),
            'metaTagDescription'=>Yii::t('settings', 'Meta Tag Description'),
            'template'=>Yii::t('settings', 'Template'),
            'defaultLayout'=>Yii::t('settings', 'Default Layout'),
            'country'=>Yii::t('settings', 'Country'),
            'state'=>Yii::t('settings', 'State'),
            'language'=>Yii::t('settings', 'Language'),
            'adminLanguage'=>Yii::t('settings', 'Admin Language'),
            'currency'=>Yii::t('settings', 'Currency'),
            'updateCurrency'=>Yii::t('settings', 'Auto Update Currency'),
            'lengthClass'=>Yii::t('settings', 'Length Class'),
            'weightClass'=>Yii::t('settings', 'Weight Class'),
            'itemsPerPageCatalog'=>Yii::t('settings', 'Default Items Per Page (Catalog)'),
            'itemsPerPageAdmin'=>Yii::t('settings', 'Default Items Per Page (Admin)'),
            'categoryProductCount'=>Yii::t('settings', 'Category Product Count'),
            'allowReviews'=>Yii::t('settings', 'Allow Reviews'),
            'allowDownloads'=>Yii::t('settings', 'Allow Downloads'),
            'voucherMin'=>Yii::t('settings', 'Voucher Min'),
            'voucherMax'=>Yii::t('settings', 'Voucher Max'),
            'displayPricesWithTax'=>Yii::t('settings', 'Display Prices With Tax'),
            'vatNumberValidate'=>Yii::t('settings', 'Vat Number Validate'),
            'useStoreTaxAddress'=>Yii::t('settings', 'Use Store Tax Address'),
            'useCustomTaxAddress'=>Yii::t('settings', 'Use Custom Tax Address'),
            'customersOnline'=>Yii::t('settings', 'Customers Online'),
            'customerGroup'=>Yii::t('settings', 'Customer Group'),
            'loginDisplayPrices'=>Yii::t('settings', 'Login Display Prices'),
            'accountTerms'=>Yii::t('settings', 'Account Terms'),
            'displayWeightOnCart'=>Yii::t('settings', 'Display Weight On Cart'),
            'guestCheckout'=>Yii::t('settings', 'Guest Checkout'),
            'checkoutTerms'=>Yii::t('settings', 'Checkout Terms'),
            'orderEditing'=>Yii::t('settings', 'Order Editing'),
            'invoicePrefix'=>Yii::t('settings', 'Invoice Prefix'),
            'orderStatus'=>Yii::t('settings', 'Order Status'),
            'completeOrderStatus'=>Yii::t('settings', 'Complete Order Status'),
            'displayStock'=>Yii::t('settings', 'Display Stock'),
            'showOutOfStockWarning'=>Yii::t('settings', 'Show Out Of Stock Warning'),
            'stockCheckout'=>Yii::t('settings', 'Stock Checkout'),
            'outOfStockStatus'=>Yii::t('settings', 'Out Of Stock Status'),
            'affiliateTerms'=>Yii::t('settings', 'Affiliate Terms'),
            'affiliateCommission'=>Yii::t('settings', 'Affiliate Commission'),
            'returnTerms'=>Yii::t('settings', 'Return Terms'),
            'returnStatus'=>Yii::t('settings', 'Return Status'),
        );
    }
    
    public function getStore(){
        if(!is_null($this->id)){
            return Store::model()->findByPk($this->id);
        }        
        return new Store;
    }
    
    public function loadDataFromStore($id){
        // load default store
        if($id == 0){
            $store = Store::getDefaultStore();
        }
        // load store from db
        else
            $store = Store::model()->findByPk($id);
        
        if(!is_null($store)){
            $this->id = $store->store_id;
            $this->name = $store->name;
            
            // load extra data from settings
            $this->owner = Yii::app()->settings->getValue('config_owner', $store->store_id);
            $this->address = Yii::app()->settings->getValue('config_address', $store->store_id);
            $this->email = Yii::app()->settings->getValue('config_email', $store->store_id);
            $this->telephone = Yii::app()->settings->getValue('config_telephone', $store->store_id);
            $this->fax = Yii::app()->settings->getValue('config_fax', $store->store_id);
            $this->title = Yii::app()->settings->getValue('config_title', $store->store_id);
            $this->metaTagDescription = Yii::app()->settings->getValue('config_meta_description', $store->store_id);
            $this->template = Yii::app()->settings->getValue('config_template', $store->store_id);
            $this->defaultLayout = Yii::app()->settings->getValue('config_layout_id', $store->store_id);
            $this->country = Yii::app()->settings->getValue('config_country_id', $store->store_id);
            $this->state = Yii::app()->settings->getValue('config_zone_id', $store->store_id);
            $this->language = Yii::app()->settings->getValue('config_language', $store->store_id);
            $this->adminLanguage = Yii::app()->settings->getValue('config_admin_language', $store->store_id);
            $this->currency = Yii::app()->settings->getValue('config_currency_auto', $store->store_id);
        }
    }
    
    public function save(){
        // Save store
        $store = Store::model()->findByPk($this->id);
        if(is_null($store)) // is insert   
            $store = new Store;
        
        $store->name = $this->name;
        $store->save();
    }

}