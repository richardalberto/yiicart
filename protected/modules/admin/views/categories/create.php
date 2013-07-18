<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('views.categories.index', 'Category');
$this->breadcrumbs = array(
    Yii::t('views.categories.index', 'Category'),
    Yii::t('views.categories.create', 'Create'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><?php echo Yii::t('views.categories.create', 'Create'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a class="btn btn-primary">Create</button>
            <a href="<?php echo $this->createUrl('index'); ?>" class="btn btn-danger">Cancel</a>
        </div>
    </div>
</div>

<br />

<?php $this->renderPartial('_form', array('model'=>$model, 'statues'=>$statues)); ?>