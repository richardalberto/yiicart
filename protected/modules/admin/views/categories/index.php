<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('categories', 'Category');
$this->breadcrumbs = array(
    Yii::t('categories', 'Category'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('categories', 'Category'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a href="<?php echo $this->createUrl('create'); ?>" class="btn btn-primary">Insert</a>
            <a id="btnDeleteAll" class="btn btn-danger">Delete</a>
        </div>
    </div>
</div>

<br />

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th style="width: 1px;"><?php echo CHtml::checkBox('checkall', false); ?></th>
            <th><?php echo Yii::t('categories', 'Category Name'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('categories', 'Sort Order'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('categories', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <?php $this->renderPartial('_view', array('category' => $category, 'parents' => array())); ?>
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