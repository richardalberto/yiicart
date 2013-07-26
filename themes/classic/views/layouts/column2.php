<?php $this->beginContent('//layouts/main'); ?>	
<div class="row">
    <div class="span12"><div id="notification"></div></div>
</div>
<div class="row">
    <?php echo $this->renderPartial('/common/leftMenu'); ?>
    <div class="span9">
        <?php if (isset($this->breadcrumbs) && count($this->breadcrumbs)): ?>
            <ul class="breadcrumb">
                <li><a href="<?php echo $this->createUrl('/site/index'); ?>"><?php echo Yii::t('common', 'Home'); ?></a> <span class="divider">/</span></li>
                <?php foreach ($this->breadcrumbs as $breadcrumb): ?>
                    <?php if ($breadcrumb == end($this->breadcrumbs)): ?>
                        <li class="active"><?php echo $breadcrumb; ?></li>
                    <?php else: ?>
                        <li><a href="#"><?php echo $breadcrumb; ?></a> <span class="divider">/</span></li>
                    <?php endif; ?>
                <?php endforeach; ?><!-- breadcrumbs -->
            </ul>
        <?php endif ?>
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>