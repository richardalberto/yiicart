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
    public $categoryImageSizeHeight;
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
    public $allowedFileMimeTypes;
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
            array('id, country, state, language, adminLanguage, currency, updateCurrency, lengthClass, weightClass, itemsPerPageCatalog, itemsPerPageAdmin, categoryProductCount, allowReviews, allowDownloads, voucherMin, voucherMax, displayPricesWithTax, vatNumberValidate, customersOnline, customerGroup, loginDisplayPrices, accountTerms, displayWeightOnCart, guestCheckout, checkoutTerms, orderEditing, orderStatus, completeOrderStatus, displayStock, showOutOfStockWarning, stockCheckout, outOfStockStatus, affiliateTerms, affiliateCommission, returnTerms, returnStatus', 'numerical'),
            array('email', 'email'),
            array('fax, metaTagDescription, template, defaultLayout, invoicePrefix, useStoreTaxAddress, useCustomTaxAddress', 'safe')
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
            $this->currency = Yii::app()->settings->getValue('config_currency', $store->store_id);
            $this->updateCurrency = Yii::app()->settings->getValue('config_currency_auto', $store->store_id);
            $this->lengthClass = Yii::app()->settings->getValue('config_length_class_id', $store->store_id);
            $this->weightClass = Yii::app()->settings->getValue('config_weight_class_id', $store->store_id);
            $this->itemsPerPageAdmin = Yii::app()->settings->getValue('config_admin_limit', $store->store_id);
            $this->itemsPerPageCatalog = Yii::app()->settings->getValue('config_catalog_limit', $store->store_id);
            $this->categoryProductCount = Yii::app()->settings->getValue('config_product_count', $store->store_id);
            $this->allowReviews = Yii::app()->settings->getValue('config_review_status', $store->store_id);
            $this->allowDownloads = Yii::app()->settings->getValue('config_download', $store->store_id);
            $this->voucherMin = Yii::app()->settings->getValue('config_voucher_min', $store->store_id);
            $this->voucherMax = Yii::app()->settings->getValue('config_voucher_max', $store->store_id);
            $this->displayPricesWithTax = Yii::app()->settings->getValue('config_tax', $store->store_id);
            $this->vatNumberValidate = Yii::app()->settings->getValue('config_vat', $store->store_id);
            $this->useStoreTaxAddress = Yii::app()->settings->getValue('config_tax_default', $store->store_id);
            $this->useCustomTaxAddress = Yii::app()->settings->getValue('config_tax_customer', $store->store_id);
            $this->customersOnline = Yii::app()->settings->getValue('config_customer_online', $store->store_id);
            $this->customerGroup = Yii::app()->settings->getValue('config_customer_group_id', $store->store_id);
            $this->loginDisplayPrices = Yii::app()->settings->getValue('config_customer_price', $store->store_id);
            $this->accountTerms = Yii::app()->settings->getValue('config_account_id', $store->store_id);
            $this->displayWeightOnCart = Yii::app()->settings->getValue('config_cart_weight', $store->store_id);
            $this->guestCheckout = Yii::app()->settings->getValue('config_guest_checkout', $store->store_id);
            $this->checkoutTerms = Yii::app()->settings->getValue('config_checkout_id', $store->store_id);
            $this->orderEditing = Yii::app()->settings->getValue('config_order_edit', $store->store_id);
            $this->invoicePrefix = Yii::app()->settings->getValue('config_invoice_prefix', $store->store_id);
            $this->orderStatus = Yii::app()->settings->getValue('config_order_status_id', $store->store_id);
            $this->completeOrderStatus = Yii::app()->settings->getValue('config_complete_status_id', $store->store_id);
            $this->displayStock = Yii::app()->settings->getValue('config_stock_display', $store->store_id);
            $this->showOutOfStockWarning = Yii::app()->settings->getValue('config_stock_warning', $store->store_id);
            $this->stockCheckout = Yii::app()->settings->getValue('config_stock_checkout', $store->store_id);
            $this->outOfStockStatus = Yii::app()->settings->getValue('config_stock_status_id', $store->store_id);
            $this->affiliateTerms = Yii::app()->settings->getValue('config_affiliate_id', $store->store_id);
            $this->affiliateCommission = Yii::app()->settings->getValue('config_commission', $store->store_id);
            $this->returnTerms = Yii::app()->settings->getValue('config_return_id', $store->store_id);
            $this->returnStatus = Yii::app()->settings->getValue('config_return_status_id', $store->store_id);
            $this->storeLogo = Yii::app()->settings->getValue('config_logo', $store->store_id);
            $this->icon = Yii::app()->settings->getValue('config_icon', $store->store_id);
            $this->categoryImageSizeWidth = Yii::app()->settings->getValue('config_image_category_width', $store->store_id);
            $this->categoryImageSizeHeight = Yii::app()->settings->getValue('config_image_category_height', $store->store_id);
            $this->productImageThumbSizeWidth = Yii::app()->settings->getValue('config_image_thumb_width', $store->store_id);
            $this->productImageThumbSizeHeight = Yii::app()->settings->getValue('config_image_thumb_height', $store->store_id);
            $this->productImagePopupSizeWidth = Yii::app()->settings->getValue('config_image_popup_width', $store->store_id);
            $this->productImagePopupSizeHeight = Yii::app()->settings->getValue('config_image_popup_height', $store->store_id);
            $this->productImageListSizeWidth = Yii::app()->settings->getValue('config_image_product_width', $store->store_id);
            $this->productImageListSizeHeight = Yii::app()->settings->getValue('config_image_product_height', $store->store_id);
            $this->additionalProductImageSizeWidth = Yii::app()->settings->getValue('config_image_additional_width', $store->store_id);
            $this->additionalProductImageSizeHeight = Yii::app()->settings->getValue('config_image_additional_height', $store->store_id);
            $this->relatedProductImageSizeWidth = Yii::app()->settings->getValue('config_image_related_width', $store->store_id);
            $this->relatedProductImageSizeHeight = Yii::app()->settings->getValue('config_image_related_height', $store->store_id);
            $this->compareImageSizeWidth = Yii::app()->settings->getValue('config_image_compare_width', $store->store_id);
            $this->compareImageSizeHeight = Yii::app()->settings->getValue('config_image_compare_height', $store->store_id);
            $this->wishListImageSizeWidth = Yii::app()->settings->getValue('config_image_wishlist_width', $store->store_id);
            $this->wishListImageSizeHeight = Yii::app()->settings->getValue('config_image_wishlist_height', $store->store_id);
            $this->cartImageSizeWidth = Yii::app()->settings->getValue('config_image_cart_width', $store->store_id);
            $this->cartImageSizeHeight = Yii::app()->settings->getValue('config_image_cart_height', $store->store_id);
            $this->ftpHost = Yii::app()->settings->getValue('config_ftp_host', $store->store_id);
            $this->ftpPort = Yii::app()->settings->getValue('config_ftp_port', $store->store_id);
            $this->ftpUsername = Yii::app()->settings->getValue('config_ftp_username', $store->store_id);
            $this->ftpPassword = Yii::app()->settings->getValue('config_ftp_password', $store->store_id);
            $this->ftpRoot = Yii::app()->settings->getValue('config_ftp_root', $store->store_id);
            $this->ftpEnabled = Yii::app()->settings->getValue('config_ftp_status', $store->store_id);
            $this->mailProtocol = Yii::app()->settings->getValue('config_mail_protocol', $store->store_id);
            $this->mailParameters = Yii::app()->settings->getValue('config_mail_parameter', $store->store_id);
            $this->smtpHost = Yii::app()->settings->getValue('config_smtp_host', $store->store_id);
            $this->smtpUsername = Yii::app()->settings->getValue('config_smtp_username', $store->store_id);
            $this->smtpPassword = Yii::app()->settings->getValue('config_smtp_password', $store->store_id);
            $this->smptPort = Yii::app()->settings->getValue('config_smtp_port', $store->store_id);
            $this->smptTimeout = Yii::app()->settings->getValue('config_smtp_timeout', $store->store_id);
            $this->newOrderAlertMail = Yii::app()->settings->getValue('config_alert_mail', $store->store_id);
            $this->newAccountAlertMail = Yii::app()->settings->getValue('config_account_mail', $store->store_id);
            $this->additionalAlertMails = Yii::app()->settings->getValue('config_alert_emails', $store->store_id);
            $this->useMaxMindFraudDetectionSystem = Yii::app()->settings->getValue('config_fraud_detection', $store->store_id);
            $this->maxMindLicenseKey = Yii::app()->settings->getValue('config_fraud_key', $store->store_id);
            $this->maxMindRiskScore = Yii::app()->settings->getValue('config_fraud_score', $store->store_id);
            $this->maxMindFraudOrderStatus = Yii::app()->settings->getValue('config_fraud_status_id', $store->store_id);
            $this->useSSL = Yii::app()->settings->getValue('config_secure', $store->store_id);
            $this->useSharedSessions = Yii::app()->settings->getValue('config_shared', $store->store_id);
            $this->robots = Yii::app()->settings->getValue('config_robots', $store->store_id);
            $this->useSEOUrls = Yii::app()->settings->getValue('config_seo_url', $store->store_id);
            $this->allowedFileExtensions = Yii::app()->settings->getValue('config_file_extension_allowed', $store->store_id);
            $this->allowedFileMimeTypes = Yii::app()->settings->getValue('config_file_mime_allowed', $store->store_id);
            $this->maintenanceMode = Yii::app()->settings->getValue('config_maintenance', $store->store_id);
            $this->allowForgottenPassword = Yii::app()->settings->getValue('config_password', $store->store_id);
            $this->encryptionKey = Yii::app()->settings->getValue('config_encryption', $store->store_id);
            $this->outputCompressionLevel = Yii::app()->settings->getValue('config_compression', $store->store_id);
            $this->displayErrors = Yii::app()->settings->getValue('config_error_display', $store->store_id);
            $this->logErrors = Yii::app()->settings->getValue('config_error_log', $store->store_id);
            $this->errorLogFilename = Yii::app()->settings->getValue('config_error_filename', $store->store_id);
            $this->googleAnalyticsCode = Yii::app()->settings->getValue('config_google_analytics', $store->store_id);
        }
    }
    
    public function save(){
        // Save store
        $store = Store::model()->findByPk((int)$this->id);
        if(is_null($store)) // is insert   
            $store = new Store;

        // fields to save
        $store->name = $this->name;
        //TODO: Add additional fields here

        return $store->save();
    }

}