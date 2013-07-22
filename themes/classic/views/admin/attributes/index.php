<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('attributes', 'Attributes');
$this->breadcrumbs = array(
    Yii::t('attributes', 'Attributes'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-edit"></i>&nbsp;<?php echo Yii::t('attributes', 'Attributes'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a href="<?php echo $this->createUrl('create'); ?>" class="btn btn-primary"><?php echo Yii::t('common', 'Insert'); ?></a>
            <a id="btnDeleteAll" class="btn btn-danger"><?php echo Yii::t('common', 'Delete'); ?></a>
        </div>
    </div>
</div>

<br />

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 1px;"><?php echo CHtml::checkBox('checkall', false); ?></th>
            <th><?php echo Yii::t('attributes', 'Attribute Name'); ?></th>
            <th><?php echo Yii::t('attributes', 'Attribute Group'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('attributes', 'Sort Order'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('attributes', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($attributes as $attribute): ?>
        <tr>
            <td><?php echo CHtml::checkBox('selected[]', false, array('value'=>$attribute->attribute_id)); ?></td>
            <td><?php echo $attribute->description->name; ?></td>
            <td><?php echo $attribute->group->description->name; ?></td>
            <td><?php echo $attribute->sort_order; ?></td>
            <td><a href="<?php echo $this->createUrl('update', array('id' => $attribute->attribute_id)); ?>" class="btn btn-success btn-mini"><?php echo Yii::t('common', 'Edit'); ?></a></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#btnDeleteAll').on('click', function(){   
            if(confirm('<?php echo Yii::t('common', 'Delete/Uninstall cannot be undone! Are you sure you want to do this?'); ?>')){
                var ids = $('input[name="selected[]"]').map(function(){
                    return this.checked ? this.value : null;
                }).get();

                document.location = '<?php echo $this->createUrl('delete'); ?>/?ids=' + ids;
            }
        });
    });
</script>