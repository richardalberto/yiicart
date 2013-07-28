<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('customers', 'Customers');
$this->breadcrumbs = array(
    Yii::t('customers', 'Customers'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('customers', 'Customers'); ?></h1></div>
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
            <th><?php echo Yii::t('customers', 'Customer Name'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('customers', 'E-Mail'); ?></th>
            <th style="width: 120px;"><?php echo Yii::t('customers', 'Customer Group'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('customers', 'Status'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('customers', 'Approved'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('customers', 'IP'); ?></th>
            <th style="width: 90px;"><?php echo Yii::t('customers', 'Date Added'); ?></th>
            <th style="width: 120px;"><?php echo Yii::t('customers', 'Login into Store'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('information', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?php echo CHtml::checkBox('selected[]', false, array('value'=>$customer->customer_id)); ?></td>
            <td><?php echo $customer->getFullname(); ?></td>
            <td><?php echo $customer->email; ?></td>
            <td><?php echo $customer->group->description->name; ?></td>
            <td><?php echo $customer->getStatus(); ?></td>
            <td><?php echo $customer->getApproved(); ?></td>
            <td><?php echo $customer->ip; ?></td>
            <td><?php echo $customer->getDateAdded(); ?></td>
            <td>&nbsp;</td>
            <td><a class="btn btn-success btn-mini" href="<?php echo $this->createUrl('update', array('id'=>$customer->customer_id)); ?>"><?php echo Yii::t('common', 'Edit'); ?></button></td>
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