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
            <button class="btn btn-info">Repair</button>
            <button class="btn btn-primary">Insert</button>
            <button class="btn btn-danger">Delete</button>
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
                <td><button class="btn btn-success btn-mini" type="button">Edit</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>