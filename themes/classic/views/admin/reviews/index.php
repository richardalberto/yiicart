<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('reviews', 'Review');
$this->breadcrumbs = array(
    Yii::t('reviews', 'Review'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('reviews', 'Review'); ?></h1></div>
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
            <th><?php echo Yii::t('reviews', 'Product'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('reviews', 'Author'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('reviews', 'Rating'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('reviews', 'Status'); ?></th>
            <th style="width: 90px;"><?php echo Yii::t('reviews', 'Date Added'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('reviews', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reviews as $review): ?>
        <tr>
            <td><?php echo CHtml::checkBox('selected[]', false, array('value'=>$review->review_id)); ?></td>
            <td><?php echo $review->product->description->name; ?></td>
            <td><?php echo $review->author; ?></td>
            <td><?php echo $review->rating; ?></td>
            <td><?php echo $review->getStatus(); ?></td>
            <td><?php echo $review->getDateAdded(); ?></td>
            <td><a class="btn btn-success btn-mini" href="<?php echo $this->createUrl('update', array('id'=>$review->review_id)); ?>"><?php echo Yii::t('common', 'Edit'); ?></button></td>
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