<?php
$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('backup', 'Backup / Restore');
$this->breadcrumbs = array(
    Yii::t('backup', 'Backup / Restore'),
);
?>

<div class="row-fluid">
    <div class="span9"><h1><i class="icon-sitemap"></i>&nbsp;<?php echo Yii::t('backup', 'Backup / Restore'); ?></h1></div>
    <div class="span2">
        <div class="btn-group">
            <a href="#" class="btn btn-primary"><?php echo Yii::t('common', 'Restore'); ?></a>
            <a href="#" class="btn btn-primary"><?php echo Yii::t('common', 'Backup'); ?></a>
        </div>
    </div>
</div>

<br />

<form>
    <legend>Restore</legend>
    <input type="file" />
    <br /><br />
    <legend>Backup</legend>
    <select multiple="true">
        <option>Not available yet!</option>
    </select>
</form>