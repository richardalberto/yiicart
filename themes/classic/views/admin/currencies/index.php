<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('currencies', 'Currencies');
$this->breadcrumbs = array(
    Yii::t('currencies', 'Currencies'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('currencies', 'Currencies'); ?></h1></div>
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
            <th><?php echo Yii::t('currencies', 'Currency Title'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('currencies', 'Code'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('currencies', 'Value'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('currencies', 'Last Updated'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('language', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($currencies as $currency): ?>
        <tr>
            <td><?php echo CHtml::checkBox('selected[]', false, array('value'=>$currency->currency_id)); ?></td>
            <td><?php echo $currency->title; ?></td>
            <td><?php echo $currency->code; ?></td>
            <td><?php echo $currency->value ?></td>
            <td><?php echo $currency->value ?></td>
            <td><a class="btn btn-success btn-mini" href="<?php echo $this->createUrl('update', array('id'=>$currency->currency_id)); ?>"><?php echo Yii::t('common', 'Edit'); ?></button></td>
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