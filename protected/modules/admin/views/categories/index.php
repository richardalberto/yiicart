<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('views.categories.index', 'Category');
$this->breadcrumbs = array(
    Yii::t('views.categories.index', 'Category'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('views.categories.index', 'Category'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a class="btn btn-info">Repair</a>
            <a href="<?php echo $this->createUrl('create'); ?>" class="btn btn-primary">Insert</a>
            <a class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>

<br />

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 1px;">&nbsp;</th>
            <th><?php echo Yii::t('views.categories.index', 'Category Name'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('views.categories.index', 'Sort Order'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('views.categories.index', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?php echo CHtml::checkBox('selected[]'); ?></td>
                <td><?php echo $category->description->name; ?></td>
                <td><?php echo $category->sort_order; ?></td>
                <td><a href="<?php echo $this->createUrl('update', array('id'=>$category->category_id)); ?>" class="btn btn-success btn-mini">Edit</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>