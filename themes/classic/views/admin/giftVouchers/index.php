<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('giftVoucher', 'Gift Vouchers');
$this->breadcrumbs = array(
    Yii::t('giftVoucher', 'Gift Vouchers'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('giftVoucher', 'Gift Vouchers'); ?></h1></div>
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
            <th><?php echo Yii::t('vouchers', 'Code'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('vouchers', 'From'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('vouchers', 'To'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('vouchers', 'Amount'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('vouchers', 'Theme'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('vouchers', 'Status'); ?></th>
            <th style="width: 150px;"><?php echo Yii::t('vouchers', 'Date Added'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('vouchers', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($giftVouchers as $voucher): ?>
        <tr>
            <td><?php echo CHtml::checkBox('selected[]', false, array('value'=>$voucher->voucher_id)); ?></td>
            <td><?php echo $voucher->code; ?></td>
            <td><?php echo $voucher->from; ?></td>
            <td><?php echo $voucher->to; ?></td>
            <td><?php echo $voucher->amount; ?></td>
            <td><?php echo $voucher->theme; ?></td>
            <td><?php echo $voucher->status; ?></td>
            <td><?php echo $voucher->date_added; ?></td>
            <td><a class="btn btn-success btn-mini" href="<?php echo $this->createUrl('update', array('id'=>$voucher->voucher_id)); ?>"><?php echo Yii::t('common', 'Edit'); ?></button></td>
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