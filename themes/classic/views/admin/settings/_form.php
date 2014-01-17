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
                <?php echo $form->dropDownList($model, 'country', $countries, array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'state', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'state', $zones, array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'language', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'language', $languages, array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'adminLanguage', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'adminLanguage', $languages, array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'currency', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'currency', $currencies, array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'updateCurrency', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->dropDownList($model, 'updateCurrency', $autoUpdateCurrency, array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'lengthClass', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'lengthClass', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'weightClass', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'weightClass', array('class' => 'span4')); ?>
            </div>
        </div>
    </div>
    <div id="option" class="tab-pane fade">
        <legend><?php echo Yii::t('settings', 'ITEMS'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'itemsPerPageCatalog', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'itemsPerPageCatalog', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'itemsPerPageAdmin', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'itemsPerPageAdmin', array('class' => 'span4')); ?>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'PRODUCTS'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'categoryProductCount', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'categoryProductCount', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'allowReviews', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'allowReviews', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'allowDownloads', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'allowDownloads', array('class' => 'span4')); ?>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'VOUCHERS'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'voucherMin', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'voucherMin', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'voucherMax', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'voucherMax', array('class' => 'span4')); ?>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'TAXES'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'displayPricesWithTax', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'displayPricesWithTax', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'vatNumberValidate', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'vatNumberValidate', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'useStoreTaxAddress', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'useStoreTaxAddress', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'useCustomerTaxAddress', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'useCustomTaxAddress', array('class' => 'span4')); ?>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'ACCOUNT'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'customersOnline', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'customersOnline', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'customerGroup', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'customerGroup', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'customerGroups', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'customerGroup', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'loginDisplayPrices', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'loginDisplayPrices', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'accountTerms', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'accountTerms', array('class' => 'span4')); ?>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'CHECKOUT'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'displayWeightOnCart', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'displayWeightOnCart', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'guestCheckout', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'guestCheckout', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'checkoutTerms', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'checkoutTerms', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'orderEditing', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'orderEditing', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'invoicePrefix', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'invoicePrefix', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'orderStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'orderStatus', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'completeOrderStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'completeOrderStatus', array('class' => 'span4')); ?>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'STOCK'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'displayStock', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'displayStock', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'showOutOfStockWarning', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'showOutOfStockWarning', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'stockCheckout', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'stockCheckout', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'outOfStockStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'outOfStockStatus', array('class' => 'span4')); ?>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'AFFILIATES'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'affiliateTerms', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'affiliateTerms', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'affiliateCommission', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'affiliateCommission', array('class' => 'span4')); ?>
            </div>
        </div>
        <legend><?php echo Yii::t('settings', 'RETURNS'); ?></legend>
        <div class="control-group">
            <?php echo $form->label($model, 'returnTerms', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'returnTerms', array('class' => 'span4')); ?>
            </div>
        </div>
        <div class="control-group">
            <?php echo $form->label($model, 'returnStatus', array('class' => 'control-label')); ?>
            <div class="controls">
                <?php echo $form->textField($model, 'returnStatus', array('class' => 'span4')); ?>
            </div>
        </div>
    </div>
</div>
<?php $this->endWidget(); ?>