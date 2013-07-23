<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('orders', 'Orders');
$this->breadcrumbs = array(
    Yii::t('orders', 'Orders'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('orders', 'Orders'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a href="#" class="btn btn-primary">Insert</a>
            <a href="#" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>

<br />

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 1px;"><?php echo CHtml::checkBox('checkall', false); ?></th>
            <th style="width: 60px;"><?php echo Yii::t('orders', 'Order ID'); ?></th>
            <th><?php echo Yii::t('orders', 'Customer'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('orders', 'Status'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('orders', 'Total'); ?></th>
            <th style="width: 100px;"><?php echo Yii::t('orders', 'Date Added'); ?></th>
            <th style="width: 100px;"><?php echo Yii::t('orders', 'Date Modified'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('orders', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($orders as $order): ?>
        <tr>
            <td><?php echo CHtml::checkBox('selected[]', false, array('value'=>$order->order_id)); ?></td>
            <td><?php echo $order->order_id; ?></td>
            <td><?php echo $order->getCustomerFullname(); ?></td>
            <td><?php echo $order->status->name; ?></td>
            <td><?php echo $order->getTotal(); ?></td>
            <td><?php echo $order->getDateAdded(); ?></td>
            <td><?php echo $order->getDateModified(); ?></td>
            <td>
                <a href="<?php echo $this->createUrl('view', array('id'=>$order->order_id)); ?>" class="btn btn-success btn-mini"><?php echo Yii::t('common', 'View'); ?></a>
                <a href="#" class="btn btn-success btn-mini"><?php echo Yii::t('common', 'Edit'); ?></a>
            </td>
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