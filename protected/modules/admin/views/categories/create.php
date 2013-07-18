<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('categories', 'Category');
$this->breadcrumbs = array(
    Yii::t('categories', 'Category'),
    Yii::t('common', 'Create'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('categories', 'Category'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a class="btn btn-primary">Create</button>
            <a href="<?php echo $this->createUrl('index'); ?>" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</div>

<br />

<?php $this->renderPartial('_form', array('model'=>$model, 'statues'=>$statues)); ?>