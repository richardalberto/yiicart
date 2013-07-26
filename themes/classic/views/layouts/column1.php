<?php $this->beginContent('//layouts/main'); ?>	
<div class="row">
    <div class="span12"><div id="notification"></div></div>
</div>
<div class="row">
    <div class="span12">
        <?php if (isset($this->breadcrumbs) && count($this->breadcrumbs)): ?>
            <?php $this->widget('Breadcumb', array(
                'breadcrumbs' => $this->breadcrumbs
            ))?>
        <?php endif ?>
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>