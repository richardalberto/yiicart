<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('manufacturers', 'Manufacturers');
$this->breadcrumbs = array(
    Yii::t('manufacturers', 'Manufacturers'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-building"></i>&nbsp;<?php echo Yii::t('manufacturers', 'Manufacturers'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a class="btn btn-primary" href="<?php echo $this->createUrl('create'); ?>"><?php echo Yii::t('common', 'Insert'); ?></a>
            <a class="btn btn-danger"><?php echo Yii::t('common', 'Delete'); ?></a>
        </div>
    </div>
</div>

<br />

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 1px;"><?php echo CHtml::checkBox('checkall', false); ?></th>
            <th><?php echo Yii::t('manufacturers', 'Manufacturer Name'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('manufacturers', 'Sort Order'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('manufacturers', 'Action'); ?></th>
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