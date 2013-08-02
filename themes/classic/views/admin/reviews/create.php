<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('reviews', 'Review');
$this->breadcrumbs = array(
    Yii::t('reviews', 'Review'),
    Yii::t('common', 'Create'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('reviews', 'Review'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a onclick="$('#review-form').submit();" class="btn btn-primary"><?php echo Yii::t('common', 'Create'); ?></button>
            <a href="<?php echo $this->createUrl('index'); ?>" class="btn btn-danger"><?php echo Yii::t('common', 'Cancel'); ?></a>
        </div>
    </div>
</div>

<br />

<?php $this->renderPartial('_form', array('model'=>$model, 'statuses'=>$statuses)); ?>