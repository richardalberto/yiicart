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
                <?php echo $form->textField($model, 'useStoreTaxAddress', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Use the store address to calculate taxes if no one is logged in. You can choose to use the store address for the customers shipping or payment address."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'useCustomerTaxAddress', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'useCustomTaxAddress', array('class' => 'span4')); ?>
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
                <?php echo $form->textField($model, 'customerGroup', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Default customer group."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'customerGroups', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'customerGroup', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Display customer groups that new customers can select to use such as wholesale and business when signing up."); ?></span>
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
                <?php echo $form->textField($model, 'accountTerms', array('class' => 'span4')); ?>
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
                <?php echo $form->textField($model, 'checkoutTerms', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Forces people to agree to terms before an a customer can checkout."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'orderEditing', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'orderEditing', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Number of days allowed to edit an order. This is required because prices and discounts may change over time corrupting the order if it's edited."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'invoicePrefix', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'invoicePrefix', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Set the invoice prefix (e.g. INV-2011-00). Invoice ID's will start at 1 for each unique prefix."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'orderStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'orderStatus', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Set the default order status when an order is processed."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'completeOrderStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'completeOrderStatus', array('class' => 'span4')); ?>
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
                <?php echo $form->textField($model, 'outOfStockStatus', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Set the default out of stock status selected in product edit."); ?></span>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'AFFILIATES'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'affiliateTerms', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'affiliateTerms', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Forces people to agree to terms before an affiliate account can be created."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'affiliateCommission', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'affiliateCommission', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "The default affiliate commission percentage."); ?></span>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'RETURNS'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'returnTerms', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'returnTerms', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Forces people to agree to terms before an return account can be created."); ?></span>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'returnStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'returnStatus', array('class' => 'span4')); ?>
                <span class="help-block"><?php echo Yii::t("settings", "Set the default return status when an returns request is submitted."); ?></span>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>