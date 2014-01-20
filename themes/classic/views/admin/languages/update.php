<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('language', 'Language');
$this->breadcrumbs = array(
    Yii::t('language', 'Language'),
    Yii::t('common', 'Update'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-cog"></i>&nbsp;<?php echo Yii::t('language', 'Language'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a onclick="$('#language-form').submit();" class="btn btn-primary"><?php echo Yii::t('common', 'Save'); ?></a>
            <a href="<?php echo $this->createUrl('index'); ?>" class="btn btn-danger"><?php echo Yii::t('common', 'Cancel'); ?></a>
        </div>
    </div>
</div>

<br />

<?php $this->renderPartial('_form', array(
    'model'=>$model,
    'statusOptions'=>$statusOptions
)); ?>