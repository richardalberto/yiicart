<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('products', 'Products');
$this->breadcrumbs = array(
    Yii::t('products', 'Products'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-cog"></i>&nbsp;<?php echo Yii::t('products', 'Products'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a href="<?php echo $this->createUrl('create'); ?>" class="btn btn-success"><?php echo Yii::t('common', 'Insert'); ?></a>
            <a id="btnDeleteAll" href="#" class="btn btn-danger"><?php echo Yii::t('common', 'Delete'); ?></a>
        </div>
    </div>
</div>

<br />

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 1px;"><?php echo CHtml::checkBox('checkall', false); ?></th>
            <th style="width: 50px;"><?php echo Yii::t('products', 'Image'); ?></th>
            <th><?php echo Yii::t('products', 'Product Name'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('products', 'Model'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('products', 'Price'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('products', 'Quantity'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('products', 'Status'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('products', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo CHtml::checkBox('selected[]', false, array('value'=>$product->product_id)); ?></td>
                <td><img src="<?php echo $product->getImageWithSize(40, 40); ?>" /></td>
                <td><?php echo $product->description->name; ?></td>
                <td><?php echo $product->model; ?></td>
                <td><?php echo $product->getFormattedPrice(); ?></td>
                <td><?php echo $product->quantity; ?></td>
                <td><?php echo $product->status; ?></td>
                <td><a class="btn btn-success btn-mini" href="<?php echo $this->createUrl('update', array('id'=>$product->product_id)); ?>"><?php echo Yii::t('common', 'Edit'); ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $this->widget('CLinkPager', array(
    'pages' => $pages,
)) ?>

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