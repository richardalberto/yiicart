<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('attributes', 'Attributes');
$this->breadcrumbs = array(
    Yii::t('attributes', 'Attributes'),
    Yii::t('common', 'Update'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('attributes', 'Attributes'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a onclick="$('#attribute-form').submit();" class="btn btn-primary"><?php echo Yii::t('common', 'Save'); ?></button>
            <a href="<?php echo $this->createUrl('index'); ?>" class="btn btn-danger"><?php echo Yii::t('common', 'Cancel'); ?></a>
        </div>
    </div>
</div>

<br />

<?php $this->renderPartial('_form', array('model'=>$model, 'groups'=>$groups)); ?>