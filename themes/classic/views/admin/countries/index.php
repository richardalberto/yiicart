<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('countries', 'Countries');
$this->breadcrumbs = array(
    Yii::t('countries', 'Countries'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('countries', 'Countries'); ?></h1></div>
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
            <th><?php echo Yii::t('countries', 'Country Name'); ?></th>
            <th><?php echo Yii::t('countries', 'ISO Code (2)'); ?></th>
            <th><?php echo Yii::t('countries', 'ISO Code (3)'); ?></th>
            <th style="width: 80px;"><?php echo Yii::t('returnActions', 'Action'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($countries as $country): ?>
        <tr>
            <td><?php echo CHtml::checkBox('selected[]', false, array('value'=>$country->country_id)); ?></td>
            <td><?php echo $country->name; ?></td>
            <td><?php echo $country->iso_code_2; ?></td>
            <td><?php echo $country->iso_code_3; ?></td>
            <td><a class="btn btn-success btn-mini" href="<?php echo $this->createUrl('update', array('id'=>$country->country_id)); ?>"><?php echo Yii::t('common', 'Edit'); ?></button></td>
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