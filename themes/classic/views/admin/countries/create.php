<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('countries', 'Country');
$this->breadcrumbs = array(
    Yii::t('countries', 'Country'),
    Yii::t('common', 'Create'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-cog"></i>&nbsp;<?php echo Yii::t('countries', 'Country'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a onclick="$('#country-form').submit();" class="btn btn-primary"><?php echo Yii::t('common', 'Create'); ?></button>
            <a href="<?php echo $this->createUrl('index'); ?>" class="btn btn-danger"><?php echo Yii::t('common', 'Cancel'); ?></a>
        </div>
    </div>
</div>

<br />

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'statusOptions'=>$statusOptions,
    'yesNoOptions'=>$yesNoOptions
)); ?>