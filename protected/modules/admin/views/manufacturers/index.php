<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('views.manufacturers.index', 'Manufacturers');
$this->breadcrumbs = array(
    Yii::t('views.manufacturers.index', 'Manufacturers'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-building"></i>&nbsp;<?php echo Yii::t('views.manufacturers.index', 'Manufacturers'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a class="btn btn-primary" href="<?php echo $this->createUrl('create'); ?>">Insert</a>
            <a class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>

<br />

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 1px;">&nbsp;</th>
            <th><?php echo Yii::t('views.manufacturers.index', 'Category Name'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('views.manufacturers.index', 'Sort Order'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('views.manufacturers.index', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($manufacturers as $manufacturer): ?>
            <tr>
                <td><?php echo CHtml::checkBox('selected[]'); ?></td>
                <td><?php echo $manufacturer->name; ?></td>
                <td><?php echo $manufacturer->sort_order; ?></td>
                <td><a class="btn btn-success btn-mini" href="<?php echo $this->createUrl('update', array('id'=>$manufacturer->manufacturer_id)); ?>">Edit</button></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>