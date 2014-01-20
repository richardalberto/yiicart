<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('settings', 'Settings');
$this->breadcrumbs = array(
    Yii::t('settings', 'Settings'),
    Yii::t('common', 'Update'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-cog"></i>&nbsp;<?php echo Yii::t('settings', 'Settings'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a onclick="$('#settings-form').submit();" class="btn btn-primary"><?php echo Yii::t('common', 'Save'); ?></a>
            <a href="<?php echo $this->createUrl('index'); ?>" class="btn btn-danger"><?php echo Yii::t('common', 'Cancel'); ?></a>
        </div>
    </div>
</div>

<br />

<?php $this->renderPartial('_form', array(
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
)); ?>