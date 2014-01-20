<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'settings-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    )
));
?>
<?php echo $form->hiddenField($model, 'id'); ?>
<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a data-toggle="tab" href="#general"><?php echo Yii::t('settings', 'General'); ?></a></li>
    <li><a data-toggle="tab" href="#store"><?php echo Yii::t('settings', 'Store'); ?></a></li>
    <li><a data-toggle="tab" href="#local"><?php echo Yii::t('settings', 'Local'); ?></a></li>
    <li><a data-toggle="tab" href="#option"><?php echo Yii::t('settings', 'Option'); ?></a></li>
    <li><a data-toggle="tab" href="#image"><?php echo Yii::t('settings', 'Image'); ?></a></li>
    <li><a data-toggle="tab" href="#ftp"><?php echo Yii::t('settings', 'FTP'); ?></a></li>
    <li><a data-toggle="tab" href="#mail"><?php echo Yii::t('settings', 'Mail'); ?></a></li>
    <li><a data-toggle="tab" href="#fraud"><?php echo Yii::t('settings', 'Fraud'); ?></a></li>
    <li><a data-toggle="tab" href="#server"><?php echo Yii::t('settings', 'Server'); ?></a></li>
</ul>
<div class="tab-content" id="myTabContent">
    <div id="general" class="tab-pane fade in active">
        <div class="control-group">
            <?php echo $form->label($model, 'name', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'name', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'owner', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'owner', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'address', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model, 'address', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'email', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'email', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'telephone', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'telephone', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'fax', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'fax', array('class' => 'span4')); ?>
            </div>
        </div>
    </div>
    <div id="store" class="tab-pane fade">
        <div class="control-group">
            <?php echo $form->label($model, 'title', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'title', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'metaTagDescription', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model, 'metaTagDescription', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'template', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'template', $themes, array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'defaultLayout', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'defaultLayout', $layouts, array('class' => 'span4')); ?>
            </div>
        </div>
    </div>
    <div id="local" class="tab-pane fade">
        <div class="control-group">
            <?php echo $form->label($model, 'country', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'country', $countries, array('class' => 'span3')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'state', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'state', $zones, array('class' => 'span3')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'language', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'language', $languages, array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'adminLanguage', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'adminLanguage', $languages, array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'currency', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'currency', $currencies, array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Change the default currency. Clear your browser cache to see the change and reset your existing cookie."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'updateCurrency', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'updateCurrency', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Set your store to automatically update currencies daily."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'lengthClass', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'lengthClass', $lengthClasses, array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'weightClass', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'weightClass', $weightClasses, array('class' => 'span2')); ?>
            </div>
        </div>
    </div>
    <div id="option" class="tab-pane fade">
        <legend><?php echo Yii::t('settings', 'ITEMS'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'itemsPerPageCatalog', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'itemsPerPageCatalog', array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Determines how many catalog items are shown per page (products, categories, etc)"); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'itemsPerPageAdmin', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'itemsPerPageAdmin', array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Determines how many admin items are shown per page (orders, customers, etc)"); ?></span>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'PRODUCTS'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'categoryProductCount', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'categoryProductCount', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Show the number of products inside the subcategories in the storefront header category menu. Be warned, this will cause an extreme performance hit for stores with a lot of subcategories!"); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'allowReviews', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'allowReviews', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Enable/Disable new review entry and display of existing reviews"); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'allowDownloads', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'allowDownloads', $yesNoOptions, array('class' => 'span1')); ?>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'VOUCHERS'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'voucherMin', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'voucherMin', array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Minimum amount a customer can purchase a voucher for."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'voucherMax', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'voucherMax', array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Maximum amount a customer can purchase a voucher for."); ?></span>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'TAXES'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'displayPricesWithTax', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'displayPricesWithTax', $yesNoOptions, array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'vatNumberValidate', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'vatNumberValidate', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Validate VAT number with http://ec.europa.eu service."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'useStoreTaxAddress', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'useStoreTaxAddress', $taxesOptions, array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Use the store address to calculate taxes if no one is logged in. You can choose to use the store address for the customers shipping or payment address."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'useCustomerTaxAddress', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'useCustomTaxAddress', $taxesOptions, array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Use the customers default address when they login to calculate taxes. You can choose to use the default address for the customers shipping or payment address."); ?></span>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'ACCOUNT'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'customersOnline', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'customersOnline', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Track customers online via the customer reports section."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'customerGroup', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'customerGroup', $customerGroups, array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Default customer group."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'loginDisplayPrices', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'loginDisplayPrices', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Only show prices when a customer is logged in."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'accountTerms', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'accountTerms', $informations, array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Forces people to agree to terms before an account can be created."); ?></span>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'CHECKOUT'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'displayWeightOnCart', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'displayWeightOnCart', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Show the cart weight on the cart page."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'guestCheckout', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'guestCheckout', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Allow customers to checkout without creating an account. This will not be available when a downloadable product is in the shopping cart."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'checkoutTerms', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'checkoutTerms', $informations, array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Forces people to agree to terms before an a customer can checkout."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'orderEditing', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'orderEditing', array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Number of days allowed to edit an order. This is required because prices and discounts may change over time corrupting the order if it's edited."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'invoicePrefix', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'invoicePrefix', array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Set the invoice prefix (e.g. INV-2011-00). Invoice ID's will start at 1 for each unique prefix."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'orderStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'orderStatus', $orderStatuses, array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Set the default order status when an order is processed."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'completeOrderStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'completeOrderStatus', $orderStatuses, array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Set the order status the customers order must reach before they are allowed to access their downloadable products and gift vouchers."); ?></span>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'STOCK'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'displayStock', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'displayStock', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Display stock quantity on the product page."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'showOutOfStockWarning', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'showOutOfStockWarning', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Display out of stock message on the shopping cart page if a product is out of stock but stock checkout is yes. (Warning always shows if stock checkout is no)"); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'stockCheckout', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'stockCheckout', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Allow customers to still checkout if the products they are ordering are not in stock."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'outOfStockStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'outOfStockStatus', $orderStatuses, array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Set the default out of stock status selected in product edit."); ?></span>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'AFFILIATES'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'affiliateTerms', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'affiliateTerms', $informations, array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Forces people to agree to terms before an affiliate account can be created."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'affiliateCommission', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'affiliateCommission', array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "The default affiliate commission percentage."); ?></span>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'RETURNS'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'returnTerms', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'returnTerms', $informations, array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Forces people to agree to terms before an return account can be created."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'returnStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'returnStatus', $returnStatuses, array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Set the default return status when an returns request is submitted."); ?></span>
            </div>
        </div>
    </div>
    <div id="image" class="tab-pane fade">
        <div class="control-group">
            <?php echo $form->label($model, 'storeLogo', array('class' => 'control-label')); ?>
            <div class="controls">
                <ul class="thumbnails">
                    <li class="span2">
                        <div class="thumbnail">
                            <img id="thumb" alt="" src="...">
                            <?php echo $form->hiddenField($model, 'storeLogo'); ?>
                            <div class="caption">
                                <p>
                                    <a onclick="image_upload('SettingsFormForm_storeLogo', 'thumb');" class="btn btn-mini btn-primary" href="#">Browse</a>
                                    <a onclick="image_clear('SettingsForm_storeLogo', 'thumb');" class="btn btn-mini" href="#">Clear</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'icon', array('class' => 'control-label')); ?>
            <div class="controls">
                <ul class="thumbnails">
                    <li class="span2">
                        <div class="thumbnail">
                            <img id="thumb" alt="" src="...">
                            <?php echo $form->hiddenField($model, 'icon'); ?>
                            <div class="caption">
                                <p>
                                    <a onclick="image_upload('SettingsFormForm_icon', 'thumb');" class="btn btn-mini btn-primary" href="#">Browse</a>
                                    <a onclick="image_clear('SettingsForm_icon', 'thumb');" class="btn btn-mini" href="#">Clear</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'categoryImageSizeWidth', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'categoryImageSizeWidth', array('class' => 'span1')); ?> x <?php echo $form->textField($model, 'categoryImageSizeHeight', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'productImageThumbSizeWidth', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'productImageThumbSizeWidth', array('class' => 'span1')); ?> x <?php echo $form->textField($model, 'productImageThumbSizeHeight', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'productImagePopupSizeWidth', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'productImagePopupSizeWidth', array('class' => 'span1')); ?> x <?php echo $form->textField($model, 'productImagePopupSizeHeight', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'productImageListSizeWidth', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'productImageListSizeWidth', array('class' => 'span1')); ?> x <?php echo $form->textField($model, 'productImageListSizeHeight', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'additionalProductImageSizeWidth', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'additionalProductImageSizeWidth', array('class' => 'span1')); ?> x <?php echo $form->textField($model, 'additionalProductImageSizeHeight', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'relatedProductImageSizeWidth', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'relatedProductImageSizeWidth', array('class' => 'span1')); ?> x <?php echo $form->textField($model, 'relatedProductImageSizeHeight', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'compareImageSizeWidth', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'compareImageSizeWidth', array('class' => 'span1')); ?> x <?php echo $form->textField($model, 'compareImageSizeHeight', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'wishListImageSizeWidth', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'wishListImageSizeWidth', array('class' => 'span1')); ?> x <?php echo $form->textField($model, 'wishListImageSizeHeight', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'cartImageSizeWidth', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'cartImageSizeWidth', array('class' => 'span1')); ?> x <?php echo $form->textField($model, 'cartImageSizeHeight', array('class' => 'span1')); ?>
            </div>
        </div>
    </div>
    <div id="ftp" class="tab-pane fade">
        <div class="control-group">
            <?php echo $form->label($model, 'ftpHost', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'ftpHost', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'ftpPort', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'ftpPort', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'ftpUsername', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'ftpUsername', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'ftpPassword', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->passwordField($model, 'ftpPassword', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'ftpRoot', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'ftpRoot', array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "The directory your yiicart installation is stored by default in 'public_html/'."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'ftpEnabled', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'ftpEnabled', $yesNoOptions, array('class' => 'span1')); ?>
            </div>
        </div>
    </div>
    <div id="mail" class="tab-pane fade">
        <div class="control-group">
            <?php echo $form->label($model, 'mailProtocol', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'mailProtocol', $mailProtocols, array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Only choose 'Mail' unless your host has disabled the php mail function."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'mailParameters', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'mailParameters', array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "When using 'Mail', additional mail parameters can be added here (e.g. \"-femail@storeaddress.com\")."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'smtpHost', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'smtpHost', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'smtpUsername', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'smtpUsername', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'smtpPassword', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->passwordField($model, 'smtpPassword', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'smptPort', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'smptPort', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'smptTimeout', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'smptTimeout', array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'newOrderAlertMail', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'newOrderAlertMail', $yesNoOptions, array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'newAccountAlertMail', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'newAccountAlertMail', $yesNoOptions, array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'additionalAlertMails', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model, 'additionalAlertMails', array('class' => 'span8')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Any additional emails you want to receive the alert email, in addition to the main store email. (comma separated)"); ?></span>
            </div>
        </div>
    </div>
    <div id="fraud" class="tab-pane fade">
        <div class="control-group">
            <?php echo $form->label($model, 'useMaxMindFraudDetectionSystem', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'useMaxMindFraudDetectionSystem', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "MaxMind is a fraud detections service. If you don't have a license key you can <a href='http://www.maxmind.com/?rId=yiicart'>sign up here</a>. Once you have obtained a key copy and paste it into the field below."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'maxMindLicenseKey', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'maxMindLicenseKey', array('class' => 'span2')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'maxMindRiskScore', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'maxMindRiskScore', array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "The higher the score the more likly the order is fraudulent. Set a score between 0 - 100."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'maxMindFraudOrderStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'maxMindFraudOrderStatus', $orderStatuses, array('class' => 'span2')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Orders over your set score will be assigned this order status and will not be allowed to reach the complete status automatically."); ?></span>
            </div>
        </div>
    </div>
    <div id="server" class="tab-pane fade">
        <div class="control-group">
            <?php echo $form->label($model, 'useSSL', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'useSSL', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "To use SSL check with your host if a SSL certificate is installed and added the SSL URL to the catalog and admin config files."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'useSharedSessions', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'useSharedSessions', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Try to share the session cookie between stores so the cart can be passed between different domains."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'robots', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model, 'robots', array('class' => 'span2', 'rows'=>4)); ?>
                <span class="help-block"><?php echo Yii::t("settings", "A list of web crawler user agents that shared sessions will not be used with. Use separate lines for each user agent."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'useSEOUrls', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'useSEOUrls', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "To use SEO URL's apache module mod-rewrite must be installed and you need to rename the htaccess.txt to .htaccess."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'allowedFileExtensions', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model, 'allowedFileExtensions', array('class' => 'span2', 'rows'=>4)); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Add which file extensions are allowed to be uploaded. Use a new line for each value."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'allowedFileMimeTypes', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model, 'allowedFileMimeTypes', array('class' => 'span2', 'rows'=>4)); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Add which file mime types are allowed to be uploaded. Use a new line for each value."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'maintenanceMode', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'maintenanceMode', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Prevents customers from browsing your store. They will instead see a maintenance message. If logged in as admin, you will see the store as normal."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'allowForgottenPassword', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'allowForgottenPassword', $yesNoOptions, array('class' => 'span1')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Allow forgotten password to be used for the admin. This will be disabled automatically if the system detects a hack attempt."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'encryptionKey', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'encryptionKey', $yesNoOptions, array('class' => 'span3')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Please provide a secret key that will be used to encrypt private information when processing orders."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'outputCompressionLevel', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'outputCompressionLevel', $yesNoOptions, array('class' => 'span3')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "GZIP for more efficient transfer to requesting clients. Compression level must be between 0 - 9"); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'displayErrors', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'displayErrors', $yesNoOptions, array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'logErrors', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'logErrors', $yesNoOptions, array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'logErrors', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'logErrors', $yesNoOptions, array('class' => 'span1')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'errorLogFilename', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'errorLogFilename', array('class' => 'span3')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'googleAnalyticsCode', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textArea($model, 'googleAnalyticsCode', array('class' => 'span4', 'rows'=>4)); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Login to your <a href='http://www.google.com/analytics/'>Google Analytics</a> account and after creating your web site profile copy and paste the analytics code into this field."); ?></span>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>